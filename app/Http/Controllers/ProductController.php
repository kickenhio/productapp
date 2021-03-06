<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Attribute;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	return response()->json(Product::with('attributes')->get()->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.edit');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	$this->validate($request, [
	    'name' => 'required|max:255',
	    'currency' => 'required',
	    'ean' => 'required|unique:products',
	    'price' => 'required|numeric|min:0',
	    'slug' => 'required',
	]);
	
	$product = Product::create($request->input());
	
	if ($request->has('attributes')){
	    $attributes = $request->input('attributes');
	    foreach($attributes as $postdata)
	    {
		$attribute = new Attribute();
		$attribute->fill($postdata);
		$attribute->product_id = $product->id;
		$attribute->currency = $product->currency;
		$attribute->save();
	    }
	}
	$product->attributes;
	return response()->json($product->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	$product = Product::findOrFail($id);
	$product->attributes;
	return response()->json($product->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	$product = Product::findOrFail($id);
	$product->attributes;
	return view('product.edit');
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
	$this->validate($request, [
	    'name' => 'required|max:255',
	    'currency' => 'required',
	    'ean' => 'required',
	    'price' => 'required|numeric|min:0',
	    'slug' => 'required',
	]);
	
        $product = Product::findOrFail($id);
	$product->fill($request->input());
	$product->updated_at = Carbon::now();
	$product->save();
	
	$product->attributes()->delete();
	if ($request->has('attributes')){
	    $attributes = $request->input('attributes');
	    foreach($attributes as $postdata)
	    {
		$attribute = new Attribute();
		$attribute->fill($postdata);
		$attribute->product_id = $product->id;
		$attribute->currency = $product->currency;
		$attribute->save();
	    }
	}
	$product->attributes;
	return response()->json($product->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	$product = Product::findOrFail($id);
	$product->attributes()->delete();
	$product->delete();
    }
}
