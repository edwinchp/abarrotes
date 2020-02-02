<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Set here:
        // app/Http/Controllers/HomeController.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
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
            'content' => 'required',
            //'description' => 'required'

        ]);

        $product = new Product([
            'name' => $request->get('name'),
            'content'=> $request->get('content'),
            'measure'=> $request->get('measure'),
            'price'=> $request->get('price'),
            'barcode' => $request->get('barcode'),
            'description' => $request->get('description')

        ]);

        $product->save();
        session()->flash('success', 'Producto agregado.');

        return redirect('/home');
        //return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('product.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('product.edit', compact('product'));
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
        $request->validate([
            'name' => 'required',
            'content' => 'required'
        ]);

        $product = Product::find($id);

        $product->name = $request->get('name');
        $product->content = $request->get('content');
        $product->measure = $request->get('measure');
        $product->price = $request->get('price');
        $product->description = $request->get('description');
        $product->barcode = $request->get('barcode');

        $product->save();
        session()->flash('success', 'Producto actualizado.');
        return redirect()->route('product.show', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        // echo
        $product->delete();
        session()->flash('success', 'Producto eliminado.');

       return redirect('/home');
    }
}
