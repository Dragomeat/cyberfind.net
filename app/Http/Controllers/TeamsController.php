<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTeamRequest;
use App\Http\Requests\JoinTeamRequest;
use App\Models\Map;
use App\Models\Team;
use App\Http\Requests\UpdateTeamRequest;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Arr;

class TeamsController extends Controller
{
    public function index()
    {
        $teams = Team::paginate(10);

        return view('teams.index', [
            'teams' => $teams
        ]);
    }

    public function show(int $id)
    {
        /**
         * @var Team $team
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
        ]);
    }

    public function create()
    {
        return view('teams.create', [
            'maps' => Team\Map::getAll(),
        ]);
    }

    public function edit(int $id)
    {
        /**
         * @var Team $team
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

    public function update(UpdateTeamRequest $request, int $id)
    {
        $team = Team::findOrFail($id);

        $this->authorize('update', $team);

        $fields = $request->intersect([
            'title',
            'city',
            'goal',
            'goal_text',
            'join_additional'
        ]);

        $maps = [];
        $inputMaps = $this->filterArray($request->intersect('maps'));
        $exceptMaps = $team->maps->pluck('map')->toArray();
        $insertMaps = array_diff($inputMaps, $exceptMaps);
        $deleteMaps = array_diff($exceptMaps, $inputMaps);

        while ($map = array_shift($insertMaps)) {
            array_push($maps, new Map(['map' => $map]));
        }

        $age = explode('-', $request->get('age'));
        $attributes = array_merge($fields, [
            'age_min' => array_shift($age),
            'age_max' => array_shift($age),
            'contacts' => json_encode([
                'socials' => $this->filterArray($request->intersect('socials')),
                'contacts' => $this->filterArray($request->intersect('contacts')),
            ])
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
                ->with('status', 'Succesfuly updated!');
        }

        return redirect()
            ->back()
            ->with('status', 'Error!');
    }

    public function store(CreateTeamRequest $request, Authenticatable $user)
    {
        $payload = $request->only([
            'title',
            'city',
            'goal',
            'goal_text',
            'join_additional'
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
            ])
        ]);

        while ($map = array_shift($inputMaps)) {
            array_push($maps, new Map(['map' => $map]));
        }

        $team = Team::create($attributes);

        $team->users()->attach($user, ['role' => 'commander', 'status' => 'accepted']);

        $team->maps()->saveMany($maps);

        return redirect(
            route('teams.show', $team->id)
        );
    }

    public function join(JoinTeamRequest $request, Authenticatable $user, int $id)
    {
        /**
         * @var Team $team
         */
        $team = Team::findOrFail($id);

        $this->authorize('join', $team);

        $team->users()->attach($user, ['role' => $request->get('role')]);

        return redirect()
            ->back()
            ->with('status', 'Succesfuly attached!');
    }

    public function search()
    {
        $teams = Team::search(request('search'))->paginate(10);

        return view('teams.index', [
            'teams' => $teams
        ]);
    }

    private function filterArray($value)
    {
        return array_filter(
            array_values($value)[0] ?? []
        );
    }
}
