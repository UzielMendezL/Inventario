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

  <style>
    #ui{
      background-color: #333;
  padding: 30px;
  margin-top: 30px;
  border-radius:10px;
  opacity: 0.9;
    }
    #ui label ,h3 {
        color: #fff
    }

    .form-container{
        background: #fff;
        padding:30px;
        border-radius:10px;
        box-shadow: 0px 0px 10px 0px
    }
  </style>
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
      <button id="close" class=" btn btn-danger navbar-btn">Cerrar Sesión</button>
      </form>
    </div>
  </nav>


<section class="container-fluid">
      <section  class="row justify-content-center">
      <div class="col-md-4">
         <div id="ui">
            <h3 class="text-center">Editof  Product</h3>
              <form class="form-group" action="{{url('/product/'. $product->id)}}" method="POST">
                  {{csrf_field()}}
                  {{method_field('PATCH')}}
                  <div class="row text-center">
                    <div class="col-lg-4">
                    <label for = 'name'>Name of Product</label>
                        <input class="form-control" id="na" name = "name" type= "text" class= "" required value ="{{$product->name}}" />
                    </div>
                  </div>
                  <div class="row text-center">
                    <div class="col-lg-4">
                      <label for='type'>Select type</label>
                    <select class="form-control"  name="type" >
                    <option value="{{$product->type}}" class= "" required >{{$product->type}}</option>
                        </select> 
                    </div>
                  </div>

                  <div class="row text-center">
                    <div class="col-lg-4">
                  <label for = 'feature'>Description</label>
                  <textarea class="form-control" id="feature" name = "feature"  class= "" required >{{$product->feature}}</textarea>
                    </div>
                  </div>

                  <div class="row text-center">
                    <div class="col-lg-4">
                  <label for = 'quantity'>Quantity</label>
                  <input min="0" max="99" class="form-control" id="quanty" name = "quantity" type= "number" class= "" required value="{{$product->quantity}}" />
                    </div>
                  </div>
                  <br>
                  <div class="col-md-12 text-center">
                    <button class="btn btn-info" type="submit">Edit Product</button>
                    <input type="button" class="btn btn-danger" value="Back"  onclick="location.href='{{url('product')}}'" />
                  </div> 
              </form>
            </div>
          </div>
        </section>
    </section>
  </body>
</html>
