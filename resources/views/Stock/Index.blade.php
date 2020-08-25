<!DOCTYPE html>
<html lang="en">
<head>
  <title>STOCK</title>
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
      <li><a href="{{url('sale')}}">Sales</a></li>
      <li class="active"><a href="#">Stocktaking</a></li>
  
      </ul>
      <form method= "POST" action = "{{route('logout')}}">
      {{csrf_field()}}
      <button id="close" class=" btn btn-danger navbar-btn">Log out</button>
      </form>
    </div>
  </nav>

<div class="container">
  
   
  <div class="alert alert-success " role="alert">  
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    @if(Session::has('Message'))
    {{
        Session::get('Message')
    
    }}
    @endif
    </div> 


    <h1 style="color: #2f3131" class=" text-right h1 display-4">Inventory History</h1>
       <div class="jumbotron">
           <div id="login" class="card">
               <div class="card-body">   
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                          <th scope ="col">Id</th>
                            <th scope ="col">Init Date</th>
                            <th scope ="col">Update Date</th>
                            <th scope ="col">Name Product</th>
                            <th scope ="col">Code</th>
                            <th scope ="col">Type</th>
                            <th scope ="col">Quantity</th>
                            <th class="text-center" scope ="col">Accions</th>
                        </tr>
                    </thead>
                <tbody>
                    @foreach ($tables as $table)
                        
                    <tr>
                    <td>{{$loop->iteration}}</td> 
                    <td>{{$table->startDate}}</td>
                    <td>{{$table->updateDate}}</td>
                    <td>{{$table->name}}</td>
                    <td>{{$table->code}}</td> 
                    <td>{{$table->type}}</td>
                    <td>{{$table->quantity}}</td>
                    <td class="text-right">
                    <button onclick="location.href='{{url('/stock/'.$table->id.'/edit')}}'" class="btn btn-info btn-sm" type="button" >Editar</button>
                    <button onclick="location.href='{{url('stock/export')}}'" class="btn btn-danger btn-sm" type="button" >Descargar</button>

                  </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
               </div>
           </div>
        </div>
        <div class="container">
        <input type="button" value="Add to Inventory" class="btn btn-info" id="create"onclick="location.href='{{url('/stock/create')}}'"/>
        </div>
    </div>

</body>
</html>




