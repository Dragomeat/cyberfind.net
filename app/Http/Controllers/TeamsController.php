<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Map;
use App\Models\Team;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Team\CreateRequest;
use App\Http\Requests\Team\UpdateRequest;
use App\Http\Requests\Team\Join\JoinRequest;
use App\Http\Requests\Team\Join\AcceptRequest;
use App\Http\Requests\Team\Join\RejectRequest;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 * Class TeamsController.
 */
class TeamsController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $teams = Team::paginate(10);

        return view('teams.index', [
            'teams' => $teams,
        ]);
    }

    /**
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show(int $id): View
    {
        /**
         * @var Team
         */
        $team = Team::findOrFail($id);

        $commander = $team->commander;

        return view('teams.show', [
            'team' => $team,
            'mainCommand' => $team->getUsersWhereRole('main_part'),
            'additionalCommand' => $team->getUsersWhereRole('additional_part'),
            'managers' => $team->getUsersWhereRole('manager'),
            'maps' => $team->maps->pluck('map')->unique(),
            'commander' => $commander,
            'teamspeak' => $team->links->teamspeak ?? null,
            'vkProfile' => $team->socials->vk ?? $commander->vkontakteUrl,
            'fbProfile' => $team->socials->fb ?? $commander->facebookUrl,
            'email' => $team->links->email ?? $commander->email,
            'telephone' => $team->links->telephone ?? $commander->telephone,
            'skype' => $team->links->skype ?? $commander->skype,
            'requests' => $team->getUsersWhereStatus(['pending', 'rejected']),
        ]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('teams.create', [
            'maps' => Team\Map::getAll(),
        ]);
    }

    /**
     * @param int $id
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(int $id): View
    {
        /**
         * @var Team
         */
        $team = Team::findOrFail($id);

        $this->authorize('update', $team);

        $commander = $team->commander;

        return view('teams.edit', [
            'team' => $team,
            'maps' => Team\Map::getAll(),
            'vkProfile' => $team->socials->vk ?? $commander->vkontakteUrl,
            'fbProfile' => $team->socials->fb ?? $commander->facebookUrl,
            'teamspeak' => $team->links->teamspeak ?? null,
            'email' => $team->links->email ?? $commander->email,
            'telephone' => $team->links->telephone ?? $commander->telephone,
            'skype' => $team->links->skype ?? $commander->skype,
        ]);
    }

    /**
     * @param UpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UpdateRequest $request, int $id): RedirectResponse
    {
        /**
         * @var Team
         */
        $team = Team::findOrFail($id);

        $this->authorize('update', $team);

        $fields = $request->intersect([
            'title',
            'city',
            'goal',
            'goal_text',
            'join_additional',
        ]);

        $maps = [];
        $inputMaps = $this->filterArray($request->intersect('maps'));
        $exceptMaps = $team->maps->pluck('map')->toArray();
        $insertMaps = array_diff($inputMaps, $exceptMaps);
        $deleteMaps = array_diff($exceptMaps, $inputMaps);

        while ($map = array_shift($insertMaps)) {
            $maps[] = new Map(['map' => $map]);
        }

        $age = explode('-', $request->get('age'));
        $attributes = array_merge($fields, [
            'age_min' => array_shift($age),
            'age_max' => array_shift($age),
            'contacts' => json_encode([
                'socials' => $this->filterArray($request->intersect('socials')),
                'contacts' => $this->filterArray($request->intersect('contacts')),
            ]),
        ]);

        if (count($maps) > 0) {
            $team->maps()->saveMany($maps);
        }

        if (count($deleteMaps) > 0) {
            $team->maps()->whereIn('map', $deleteMaps)->delete();
        }

        if ($team->update($attributes)) {
            return redirect()
                ->back()
                ->with('status', [
                    'message' => 'Succesfuly updated!',
                    'type' => 'success',
                ]);
        }

        return redirect()
            ->back()
            ->with('status', [
                'message' => 'Error!',
                'type' => 'error',
            ]);
    }

    /**
     * @param $value
     * @return array
     */
    private function filterArray($value): array
    {
        return array_filter(
            array_values($value)[0] ?? []
        );
    }

    /**
     * @param CreateRequest $request
     * @param Authenticatable $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request, Authenticatable $user): RedirectResponse
    {
        $payload = $request->only([
            'title',
            'city',
            'goal',
            'goal_text',
            'join_additional',
        ]);

        $maps = [];
        $inputMaps = $this->filterArray($request->intersect('maps'));
        $age = explode('-', $request->get('age'));
        $attributes = array_merge($payload, [
            'age_min' => array_shift($age),
            'age_max' => array_shift($age),
            'contacts' => json_encode([
                'socials' => $this->filterArray($request->intersect('socials')),
                'contacts' => $this->filterArray($request->intersect('contacts')),
            ]),
        ]);

        while ($map = array_shift($inputMaps)) {
            $maps[] = new Map(['map' => $map]);
        }

        /**
         * @var Team
         */
        $team = Team::create($attributes);

        $team->users()->attach($user, ['role' => 'commander', 'status' => 'accepted']);

        $team->maps()->saveMany($maps);

        return redirect(
            route('teams.show', $team->id)
        );
    }

    /**
     * @param JoinRequest $request
     * @param Authenticatable $user
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function join(JoinRequest $request, Authenticatable $user, int $id): RedirectResponse
    {
        /**
         * @var Team
         */
        $team = Team::findOrFail($id);

        $this->authorize('join', $team);

        $team->users()->attach($user, ['role' => $request->get('role')]);

        return redirect()
            ->back()
            ->with('status', [
                'message' => 'Succesfuly attached!',
                'type' => 'success',
            ]);
    }

    /**
     * @param Authenticatable $user
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function leave(Authenticatable $user, int $id): RedirectResponse
    {
        /**
         * @var Team
         */
        $team = Team::findOrFail($id);

        $this->authorize('leave', $team);

        $team->users()->detach($user);

        return redirect()
            ->back()
            ->with('status', [
                'message' => 'Succesfuly detached!',
                'type' => 'success',
            ]);
    }

    /**
     * @param AcceptRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function accept(AcceptRequest $request, int $id): RedirectResponse
    {
        /**
         * @var Team
         */
        $team = Team::findOrFail($id);
        $userId = $request->get('user_id');

        $this->authorize('manage', $team);

        $team->users()->updateExistingPivot($userId, ['status' => 'accepted']);

        return redirect()
            ->back()
            ->with('status', [
                'message' => 'Succesfuly applied!',
                'type' => 'success',
            ]);
    }

    /**
     * @param RejectRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function reject(RejectRequest $request, int $id): RedirectResponse
    {
        /**
         * @var Team
         */
        $team = Team::findOrFail($id);
        $userId = $request->get('user_id');

        $this->authorize('manage', $team);

        $team->users()->updateExistingPivot($userId, ['status' => 'rejected']);

        return redirect()
            ->back()
            ->with('status', [
                'message' => 'Succesfuly rejected!',
                'type' => 'success',
            ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(): View
    {
        $teams = Team::search(request('search'))->paginate(10);

        return view('teams.index', [
            'teams' => $teams,
        ]);
    }
}
