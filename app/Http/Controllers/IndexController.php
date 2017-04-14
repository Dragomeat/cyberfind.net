<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;

/**
 * Class IndexController.
 */
class IndexController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }
}
