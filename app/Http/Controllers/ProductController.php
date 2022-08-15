<?php

namespace App\Http\Controllers;

use App\Models\Product as Product;
use App\Http\Resources\Product as ProductResource;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(15);
        return ProductResource::collection($products);
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
        $product = new Product;
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->description = $request->input('description');
        $product->rating = $request->input('rating');
        $product->images = $request->input('images');
        $product->bestSeller = $request->input('bestSeller');

        if( $product->save() ){
        return new ProductResource( $product );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail( $id );
        return new ProductResource( $product );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail( $id );
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->description = $request->input('description');
        $product->rating = $request->input('rating');
        $product->images = $request->input('images');
        $product->bestSeller = $request->input('bestSeller');
    
        if( $product->save() ){
            return new ProductResource( $product );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail( $id );
        if( $product->delete() ){
        return new ProductResource( $product );
        }
    }
}
