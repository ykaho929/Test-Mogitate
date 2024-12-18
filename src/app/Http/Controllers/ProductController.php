<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\SeasonRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth; 

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $input = '';
        $products = Product::paginate(6);
        return view('index', compact('products', 'input'));
    }

    public function search(Request $request)
    {
        $input = $request->input('input');
        $products = Product::where('name', 'like', '%' . $input . '%')->paginate(6); 
        return view('index', compact('products', 'input'));
    }

    public function show(Product $product)
    {
        $seasons = $product->seasons;
        return view('detail', compact('product','seasons'));
    }

    public function store(Product $product, ProductRequest $request)
    {
        try {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('fruits-img', 'public');
            $validatedData['image'] = $imagePath;
        }

        DB::transaction(function () use ($validatedData) {
            $product = Product::create($validatedData);
            $product->seasons()->sync($request->input('seasons'));
        });
        
        return redirect('/products');
        } 
        catch (\Exception $e) {
        Log::error($e);}
        
    }

    public function update(ProductRequest $request, Product $product)
    {
        $validatedData = $request->validated();
        $product->update($validatedData);
        $product->update($request->except('seasons'));
        $product->seasons()->sync($request->input('seasons', []));
        return redirect()->route('products.index');
    }

    public function destroy(Request $request, Product $product)
    {
        $product->seasons()->detach();
        $product->delete();
        return redirect()->route('products.index');
    }
}
