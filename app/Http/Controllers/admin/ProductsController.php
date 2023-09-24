<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Inc\Rsp;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return Rsp::ok()->setItems($products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'pv' => 'required',
            'cu' => 'required',
            'id_categoria' => 'required',
        ]);
        $product = new Product();
        $product->name = $req->name;
        $product->email = $req->email;
        $rsp = $product->save();
        return response()->json([
            'ok' => true,
            'msg' => '',
        ]);
    }

    /**
     * Display the specified resource.
     */
    /*public function show(Product $product)
    {
        return $product;
    }*/

    public function show($id)
    {
        return Product::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //Product:Product::
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
