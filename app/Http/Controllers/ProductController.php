<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      return response()->json(Product::paginate(10));
   }

   public function getAll($id)
   {
      return response()->json(Product::all()->except($id), 200);
   }

   public function byCategory($category)
   {
      return response()->json(Product::whereIn('category_id', explode(',', $category))->get(), 200);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      //
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $request->validate([
         'name' => 'required',
         'price' => 'required',
      ]);
      Product::create([
         'title'       => $request->title,
         'slug'        => Str::slug($request->title),
         'sku'         => $request->sku,
         'price'       => $request->price,
         'description' => $request->description,
         'image'       => $request->image,
         'status'      => $request->status,
         'category_id' => $request->category_id,
         'brand_id'    => $request->brand_id,
      ]);
      return response()->json("Product added successfully", 201);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Product  $product
    * @return \Illuminate\Http\Response
    */
   public function show(Product $product)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Product  $product
    * @return \Illuminate\Http\Response
    */
   public function edit(Product $product)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Product  $product
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Product $product)
   {
      $request->validate([
         'name' => 'required',
         'price' => 'required',
      ]);
      $product->update([
         'title'       => $request->title,
         'slug'        => Str::slug($request->title),
         'sku'         => $request->sku,
         'price'       => $request->price,
         'description' => $request->description,
         'image'       => $request->image,
         'status'      => $request->status,
         'category_id' => $request->category_id,
         'brand_id'    => $request->brand_id,
      ]);
      return response()->json("Product updated successfully");
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Product  $product
    * @return \Illuminate\Http\Response
    */
   public function destroy(Product $product)
   {
      $product = Product::find($product);
      $product->delete();

      return response()->json();
   }
}