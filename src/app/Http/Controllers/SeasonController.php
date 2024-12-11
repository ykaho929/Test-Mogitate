<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function create(){
        $seasons = Season::all();
        return view('add', compact('seasons'));
    }   
    
}
