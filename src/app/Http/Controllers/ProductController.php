<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }

    // public function find()
    // {
    //     return view('find', ['input' => '']);
    // }

    public function search(Request $request)
    {
        $input = $request->input('input');
        $item = Product::where('name', 'like', '%' . $request->input . '%')->first();
        $param = [
            'input' => $request->input,
            'item' => $item
        ];
        return view('index', compact('item', 'input'));
    }

    public function add(){
        return view('add');
    }        
}
