<!DOCTYPE html>
<html lang="en">
<head>
  <title>SALE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="{!! asset('css/style.css') !!}">
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Welcome {{auth()->user()->name}}</a>
        </div>
        <ul class="nav navbar-nav">
        <li ><a href="{{url('product')}}">Products</a></li>
        <li class="active"><a href="#">Sales</a></li>
        <li ><a href="{{url('stock')}}">StockTaking</a></li>
    
        </ul>
        <form method= "POST" action = "{{route('logout')}}">
        {{csrf_field()}}
        <button id="close" class=" btn btn-danger navbar-btn">Log out</button>
        </form>
        </div>
    </nav>


<div class="container">
  
<div class="alert alert-success " role="alert">  
@if(Session::has('Message'))
{{
    Session::get('Message')

}}
@endif
    </div>
    <h1 style="color: #2f3131" class=" text-right h1 display-4">Sales Inventory</h1>
            <div class="jumbotron">
                <div id="login" class="card">
                    <div class="card-body">   
                    <table class="table table-dark table-hover">
                        <thead>
                            <tr>
                                <th scope ="col">Id</th>
                                <th scope ="col">Name</th>
                                <th scope ="col">Product Code</th>
                                <th scope ="col">Type</th>
                                <th scope ="col"> Sale Date</th>
                                <th scope ="col">Quantity</th>
                                <th scope ="col">Status</th>
                                <th class="text-center" scope ="col">Accions</th>
                            </tr>
                        </thead>
                    <tbody>
                        @foreach ($sales as $sale)
                            
                        <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$sale->name}}</td>
                        <td>{{$sale->productCode}}</td>
                        <td>{{$sale->type}}</td>
                        <td>{{$sale->saleDate}}</td>
                        <td>{{$sale->quantity}}</td>
                        <td>{{$sale->active}}</td>
                        <td class="text-right">
                        <button onclick="location.href='{{url('/sale/changeStatus/'.$sale->id)}}'" class="btn btn-danger btn-sm" type="button" >Cancel</button>
                        <button onclick="location.href='{{url('/sale/export')}}'" class="btn btn-info btn-sm" type="button" >Download</button>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <div class="container">
            <input type="button" onclick="location.href='{{url('sale/create')}}'" class="btn btn-info" value="Agree new sale">
            </div>
        </div>
    </body>
</html>




