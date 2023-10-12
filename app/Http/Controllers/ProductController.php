<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index');
    }

    public function getData()
    {
        $products = Product::all();
        return ResponseHelper::sendApiSuccess($products);
    }

    public function getDetail($id)
    {
        $product = Product::find($id);
        return ResponseHelper::sendApiSuccess($product);
    }
 
    public function create()
    {
        return view('product.create');   
    }

    public function store(Request $request)
    {
        $product = new Product;
        $product->code = $request->code;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->default_discount = $request->default_discount;
        $product->save();
        return ResponseHelper::sendApiSuccess($product, "Data is Strored!");
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->default_discount = $request->default_discount;
        $product->save();
        return ResponseHelper::sendApiSuccess($product, "Data is Updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return ResponseHelper::sendApiSuccess([], "Data is Deleted!");
    }
}
