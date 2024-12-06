<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function find()
    {
        return view('find', ['input' => '']);
    }

    public function search(Request $request)
    {
        $item = Product::where('name', $request->input)->first();
        $param = [
            'input' => $request->input,
            'item' => $item
        ];
        return view('index', $param);
    }
}
