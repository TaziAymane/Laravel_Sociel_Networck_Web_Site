<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $users = [
            ["id" => 1, "nom" => "aymane", "prenom" => "tazi"],
            ["id" => 2, "nom" => "ahmed", "prenom" => "ahmadi"],
            ["id" => 3, "nom" => "med", "prenom" => "alaoui"],
            ["id" => 4, "nom" => "saaid", "prenom" => "saaidi"],
        ];
        
        return view('components.index', compact('users'));
    }

    public function ajouter()
    {
        return view('components.create');
    }
}