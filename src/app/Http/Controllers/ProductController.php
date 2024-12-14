<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\SeasonRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $input = '';
        return view('index', compact('products', 'input'));
    }

    public function search(Request $request)
    {
        $input = $request->input('input');
        $products = Product::where('name', 'like', '%' . $input . '%')->get(); 
        return view('index', compact('products', 'input'));
    }

    public function add(){
        return view('add');
    }
    
    public function store(Request $request)
    {
        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = Storage::disk('public')->putFile('images', $file);

            return response()->json(['message' => 'Image uploaded successfully', 'url' => Storage::disk('public')->url($path)]);
        }

        return response()->json(['error' => 'No image file uploaded'], 400);
        
    }

    public function create(ProductRequest $product)
    {
        Product::create($request->validated());
        return redirect('/products');
    }
}
