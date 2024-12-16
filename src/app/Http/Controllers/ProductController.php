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

    public function store(ProductRequest $request)
    {
        $data = $request->validated(); 
       
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $path = Storage::disk('custom')->put('fruits-img/' . $filename, $request->file('image'));
            $data['image'] = $path;
            Model::create($data);
        }

        $product = Product::create($data);

        $product->seasons()->sync($request->input('seasons')); 

        return redirect()->route('/products'); 
        
    }

    public function create(ProductRequest $product)
    {
        Product::create($request->validated());
        return redirect('/products');
    }

    public function show(Product $product)
    {
        $seasons = $product->seasons;
        return view('detail', compact('product','seasons'));
    }

    public function update(ProductRequest $request)
    {
        $product = $request->only(['']);
        Product::find($request->id)->update($product);
        return redirect('/products');
    }
}
