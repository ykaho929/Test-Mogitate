<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\SeasonRequest;
use App\Models\Season;
use Illuminate\Http\Request;


class SeasonController extends Controller
{
    public function create(){
        $seasons = Season::all();
        return view('register', compact('seasons'));
    }

    public function seasons(){
        return $this->hasManyThrough(Season::class, ProductSeason::class);
        $product->seasons()->sync($request->input('seasons', []));
    }
    
}
