<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\SeasonRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\Paginator;



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
        $products = Product::where('name', 'like', '%' . $input . '%')->get(); 
        return view('index', compact('products', 'input'));
    }

    public function store(ProductRequest $request)
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
        
        return redirect()->route('products.index');
        dd($request->validated());
        } 
        catch (\Exception $e) {
        Log::error($e);}
                
    }

    public function show(Product $product)
    {
        $seasons = $product->seasons;
        return view('detail', compact('product','seasons'));
    }

    public function update(ProductRequest $request)
    {
        $validatedData = $request->validated();
        $product->update($validatedData);

        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        $product->image_path = asset('storage/fruits-img/' .$product->image);
        return view('products.edit', compact('product'));
    }
}
