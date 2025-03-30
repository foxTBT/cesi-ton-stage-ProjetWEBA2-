<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuiSommesNousController extends Controller
{
    public function index()
    {
        return view('a_propos.qui_sommes_nous');
    }
}

