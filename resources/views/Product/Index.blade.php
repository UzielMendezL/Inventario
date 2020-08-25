<!DOCTYPE html>
<html lang="en">
<head>
  <title>PRODUCT</title>
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
    <li class="active"><a href="#">Products</a></li>
    <li><a href="{{url('sale')}}">Sales</a></li>
    <li><a href="{{url('stock')}}">StockTaking</a></li>

    </ul>
    <form method= "POST" action = "{{route('logout')}}">
    {{csrf_field()}}
    <button id="close" class=" btn btn-danger navbar-btn">Log out</button>
    </form>
  </div>
</nav>

   
@if(Session::has('Message'))
{{
    Session::get('Message')

}}
@endif

<div class="container">
     
       <div class="jumbotron">
           <div id="login" class="card">
               <div class="card-body">   
                <table class="table table-dark table-hover ">
                    <thead>
                        <tr>
                            <th scope ="col">Id</th>
                            <th scope ="col">Name</th>
                            <th scope ="col">Type</th>
                            <th scope ="col">Feature</th>
                            <th scope ="col">Quantity</th>
                            <th scope ="col">Availability</th>
                            <th class="text-center" scope ="col">Accions</th>
                        </tr>
                    </thead>
                <tbody>
                    @foreach ($products as $product)

                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->type}}</td>
                    <td>{{$product->feature}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->availability}}</td>
                    <td class="text-right">

                     <button onclick="location.href='{{url('/product/'.$product->id.'/edit')}}'" class="btn btn-info" type="button" >Edit</button>
                    <button onclick="location.href='{{url('/product/changeStatus/'.$product->id)}}'" class="btn btn-danger" >Desactive</button>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
               </div>
           </div>
        </div>
        <div class="container">
        <input class="btn btn-info" type="button" id="create" value="Enter New Product" onclick="location.href='{{url('/product/create')}}'"/>
        </div>
    </div>

</body>
</html>




