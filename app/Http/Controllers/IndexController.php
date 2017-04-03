<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }
}
