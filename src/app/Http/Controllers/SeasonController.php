<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function add(){
        $seasons = ['春', '夏', '秋', '冬'];
        return view('add', compact('seasons'));
    }   
}
