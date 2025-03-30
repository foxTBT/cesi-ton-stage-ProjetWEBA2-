<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NosValeursController extends Controller
{
    public function index()
    {
        return view('a_propos.nos_valeurs');
    }
}
