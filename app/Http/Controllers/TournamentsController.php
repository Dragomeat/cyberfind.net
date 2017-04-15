<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TournamentsController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $tournaments = Tournament::simplePaginate(10);

        return view('tournaments.index', [
            'tournaments' => $tournaments
        ]);
    }

    /**
     * @param int $id
     * @return View
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function show(int $id): View
    {
        $tournament = Tournament::findOrFail($id);

        return view('tournaments.show', [
            'tournament' => $tournament
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search()
    {
        $tournaments = Tournament::search(request('search'))->paginate(10);

        return view('tournaments.index', [
            'tournaments' => $tournaments,
        ]);
    }
}
