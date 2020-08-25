<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
        $this->middleware('auth');

     }
    public function index()
    {
        $getData['products'] = Product::paginate(5);
        return view('Product.Index', $getData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('Product.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataProduct=request()->except('_token');
        $dataProduct['code'] = 'F'.rand(2,500);
        $dataProduct['availability'] = true;
         $checkQuantity = $request->input('quantity');

        if( $checkQuantity < 1){
         $dataProduct['availability'] = false;
        }

        Product::insert($dataProduct);
        return redirect('product')->with('Message','Product has been successfully added ');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($productId)
    {
        $product = Product::findOrFail($productId);
        
        return view('Product.Edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productId)
    {
        $dataProduct = request()-> except(['_token','_method',
        'updated_at']);
        $dataProduct['availability'] = true;
        $checkQuantity = $request->input('quantity');
        if( $checkQuantity < 1){
            $dataProduct['availability'] = false;
           }

          Product::where('id', '=',$productId)->update($dataProduct);
        return redirect('product')->with('Message','Product has been successfully modified');

    }

    
    public function updateAvailability($productId)
    {

        Product::where('id', $productId)->update(array('availability' => false,'quantity'=> 0));

         return redirect('product')->with('Message','Product has been successfully deactivated');

    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}
