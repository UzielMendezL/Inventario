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
      <li><a href="{{url('stock')}}">StockTaking</a></li>
  
      </ul>
      <form method= "POST" action = "{{route('logout')}}">
      {{csrf_field()}}
      <button id="close" class=" btn btn-danger navbar-btn">Log out</button>
      </form>
    </div>
  </nav>



<form action="{{url('/sale/'. $sale->id)}}" method="POST">
        {{csrf_field()}}
        {{method_field('PATCH')}}

    <label for = 'name'>Name of project</label>
        <input id="na" name = "name" type= "text" class= ""  required value ="{{$sale->name}}" />

        <label for='type'>Select a type</label>
    <select  name="type" >
    <option value="{{$product->type}}" class= "" required >{{$sale->type}}</option>
        </select> 

        <label for = 'feature'>Description</label>
        <textarea id="feature" name = "feature"  class= "" required >{{$sale->feature}}</textarea>

        <label for = 'quantity'>Quantity</label>
        <input id="quanty" min="0" max="99" name = "quantity" type= "number" class= "" required value="{{$sale->quantity}}" />
        
        <input class="" type="submit" value="Edit Sale"/>
        <input class="btn btn-danger" value="Regresar" onclick="location.href='{{sale}}'"/>
    </body>
</form>

</html>
<body>