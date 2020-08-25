<?php

namespace App\Http\Controllers;

use App\StockTaking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReportExport;


class StockTakingController extends Controller
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
        $tables = DB::table('stockTaking')
        ->join('products', 'products.code', '=','stockTaking.productCode')
         ->select('stockTaking.startDate','stockTaking.updateDate',
         'products.name','products.code','products.type',
         'stockTaking.quantity','stockTaking.id')
         ->get();

        return view('Stock.Index',compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('Stock.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataStock=request()->except('_token');
        $dataStock['availability'] = true;
        $checkQuantity = $request->input('quantity');
        
        if( $checkQuantity < 1){
            $dataProduct['availability'] = false;
        }

        $getDate = date('Y-m-d H:i:s');
        $dataStock['startDate'] = $getDate;
        $y = response()->json($dataStock);

      $exist = $request->input('productCode');
        $userProduct = DB::table('products')->where('code',$exist)->first();
        $noRepeatCode = DB::table('stockTaking')->where('productCode',$exist)->first();
       
        if($userProduct !=null && $userProduct['availability'] == true && $noRepeatCode == null){
            $dataStock['productName'] =$userProduct ->name;
            $dataStock['productType'] =$userProduct ->type;

            StockTaking::insert($dataStock);
             return redirect('stock')->with('Message','Product has been successfully added');

        }
     
        return redirect('stock')->with('Message','Sorry, check that the product exists, that it is not repeated or has in stock');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StockTaking  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StockTaking  $products
     * @return \Illuminate\Http\StockTaking
     */
    public function edit($stockId)
    {
        $findStock = StockTaking::findOrFail($stockId);
        
        return view('Stock.Edit',compact('findStock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StockTaking  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $stockId)
    {
        $dataStock = request()-> except(['_token','_method','updated_at']);
        $dataStock['availability'] = true;
        $checkQuantity = $request->input('quantity');
        $getDate = date('Y-m-d H:i:s');
        $dataStock['updateDate'] = $getDate;
        
        if( $checkQuantity < 1){
            $dataProduct['availability'] = false;
           }

          StockTaking::where('id', '=',$stockId)->update($dataStock);
        return redirect('stock')->with('Message','Product has been successfully modified');
    }

    
    public function updateAvailability($productId)
    {
        $dataProduct = request()-> except(['_token','_method']);
          Product::where('id', '=',$productId)->update($dataProduct);
          $product = StockTaking::findOrFail($productId);
          return view('Stock.Edit',compact('product'));
    }
    
    public function export() 
    {
        return Excel::download(new ReportExport, 'stockTaking.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StockTaking  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }

}
