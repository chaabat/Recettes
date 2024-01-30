<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(Request $request)
    {
        $nom = 'chaabat';
        $languages = ['php', 'js', 'html', 'css'];
        // $languages =[];
        $color = '';

        return view('pages/home', compact('nom', 'languages', 'color'));
    }
}
