<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Product;
use App\StockTaking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReportSaleExport;
use Validator;



class SaleController extends Controller
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
        $sales = DB::table('sales')
        ->join('products', 'products.code', '=','sales.productCode')
        ->join('stockTaking', 'stockTaking.productCode', '=', 'sales.productCode')
         ->select(
         'products.name','products.type','sales.productCode','sales.saleDate',
         'stockTaking.quantity','sales.active', 'sales.id')
         ->get();

        return view('Sale.Index',compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('Sale.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataSale=request()->except('_token');
   
        $findSale = StockTaking::findOrFail($stockId);
        if($findSale == null){
        
        $getMecanics= $dataSale['mecanics'];
        $getElectric= $dataSale['electrics'];
        $getIlumination= $dataSale['iluminations'];

        if( $getMecanics != null){
            $userProduct = DB::table('products')->where('name',$getMecanics)->first();
            $stockTaking = DB::table('stockTaking')->where('productCode',$userProduct->code)->first();
            $modifyQantity= $stockTaking->quantity - $dataSale['quantity'];
            

            if($dataSale['quantity']> $modifyQantity ||  $modifyQantity < 1 )
            {
                return redirect('sale')->with('Message','The sale was successful because it  doesnt have in stock ');

            }
            StockTaking::where('id',$userProduct->id)->update(['quantity' =>$modifyQantity]);
                
            $getDate = date('Y-m-d H:i:s');
            $data =new Sale;
            $data->productCode = $userProduct->code;
            $data->active = true;
            $data->saleDate = $getDate;
            $data->stockQuantity = $dataSale['quantity'];
            $data->save();
        }
        
        if( $getElectric != null){
            $userProduct = DB::table('products')->where('name',$getElectric)->first();
            $stockTaking = DB::table('stockTaking')->where('productCode',$userProduct->code)->first();
            $modifyQantity= $stockTaking->quantity - $dataSale['quantity'];
            

            if($dataSale['quantity']> $modifyQantity ||  $modifyQantity < 1 )
            {
                return redirect('sale')->with('Message','The sale was successful because it  doesnt have in stock ');

            }
            StockTaking::where('id',$userProduct->id)->update(['quantity' =>$modifyQantity]);
            $data =new Sale;
            $data->productCode = $userProduct->code;
            $data->active = true;
            $data->saleDate = $getDate;
            $data->stockQuantity = $dataSale['quantity'];
            $data->save();
       
        }
        
        if( $getIlumination != null){
            $userProduct = DB::table('products')->where('name',$getIlumination)->first();
            $stockTaking = DB::table('stockTaking')->where('productCode',$userProduct->code)->first();
            $modifyQantity= $stockTaking->quantity - $dataSale['quantity'];
            
            if($dataSale['quantity']> $modifyQantity ||  $modifyQantity < 1 )
            {
                return redirect('sale')->with('Message','The sale was successful because it  doesnt have in stock ');

            }
            StockTaking::where('id',$userProduct->id)->update(['quantity' =>$modifyQantity]);
            $data =new Sale;
            $data->productCode = $userProduct->code;
            $data->active = true;
            $data->saleDate = $getDate;
            $data->stockQuantity = $dataSale['quantity'];
            $data->save();
          }

           return redirect('sale')->with('Message','The sale was successful');
        }
        return redirect('sale')->with('Message','Im sorry a problem occurred');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $products
     * @return \Illuminate\Http\Sale
     */
    public function edit($stockId)
    {
        $findStock = Sale::findOrFail($stockId);
        
        return view('Stock.Edit',compact('findStock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $products
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

           Sale::where('id', '=',$stockId)->update($dataStock);
        return redirect('stock')->with('Message','Producto se ha modificado correctamente');
    }

    
    public function updateAvailability($productId)
    {
        $dataProduct = request()-> except(['_token','_method']);

        Sale::where('id', '=',$productId)->update($dataProduct);

          $product = Sale::findOrFail($productId);
        
        return view('Stock.Edit',compact('product'));

    }
    public function cancelSale($saleId){

    }
    
    public function export() 
    {
        return Excel::download(new ReportSaleExport, 'sale.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
    public function fetchMecanic(Request $request)
    {
        $query = $request->get('query');
        $getData = DB::table('stockTaking')
        ->where('productName' ,'LIKE', '%'.$query.'%')
        ->where('productType' ,'=', 'Mecanicas')
        ->where('availability' ,'=', true)
        ->get();


        $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
        foreach($getData as $row)
        {
        $output .= '
        <li><a id="autocomplete" href="#">'.$row->productName.'</a></li>
        ';
        }
        $output .= '</ul>';
        echo $output;

    
    }
    public function fetchElectric(Request $request)
    {
        $query = $request->get('query');
        $getData = DB::table('stockTaking')
        ->where('productName' ,'LIKE', '%'.$query.'%')
        ->where('productType' ,'=', 'Electricas')
        ->where('availability' ,'=', true)
        ->get();


        $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
        foreach($getData as $row)
        {
            $output .= '
            <li><a id="autocomplete" href="#">'.$row->productName.'</a></li>
            ';
        }
        $output .= '</ul>';
        echo $output;

    }
        
    public function fetchIlumination(Request $request)
    {
        $query = $request->get('query');
        $getData = DB::table('stockTaking')
        ->where('productName' ,'LIKE', '%'.$query.'%')
        ->where('productType' ,'=', 'Iluminacion')
        ->where('availability' ,'=', true)
        ->get();


        $output = '<ul  class="dropdown-menu" style="display:block; position:relative">';
        foreach($getData as $row)
        {
            $output .= '
            <li><a id="autocomplete" href="#">'.$row->productName.'</a></li>
            ';
        }
        $output .= '</ul>';
        echo $output;
    }
      
    public function updateStatus($saleId)
    {
        $getSale = DB::table('sales')->where('id',$saleId)->first();

        $finalDate = date_create($getSale->cancelDate =date('Y-m-d H:i:s')) ; 
        $initialDate  = date_create($getSale->saleDate) ;
        $dateDiff = date_diff($finalDate,$initialDate);

        if($dateDiff->format("%R%a") <= 15){
            
            Sale::where('id', $saleId)->update(array('active' => false));

          return redirect('sale')->with('Message','The sale has been successfully cancelede');
        }

        return redirect('sale')->with('Message','Sorry you exceeded the 15 days you could cancel');
    }

}


