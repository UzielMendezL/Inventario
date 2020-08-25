<!DOCTYPE html>
<html lang="en">
<head>
  <title>STOCK</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="{!! asset('css/style.css') !!}">
  
  <script>
    $( function() {
      $( document ).tooltip();
    } );
    </script>
  
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
      <li ><a href="{{url('product')}}">Products</a></li>
      <li><a href="{{url('sale')}}">Sales</a></li>
      <li class="active"><a href="#">StockTaking</a></li>
  
      </ul>
      <form method= "POST" action = "{{route('logout')}}">
      {{csrf_field()}}
      <button id="close" class=" btn btn-danger navbar-btn">Log out</button>
      </form>
    </div>
  </nav>



  <section class="container-fluid">
    <section  class="row justify-content-center">
      <div class="col-md-4">
        <div id="ui">
            <h3>Add Stock Products</h3>
            <form class="form-group" action="{{url('/stock')}}" method="POST">
                {{csrf_field()}}

                <div class="row text-center">
                  <div class="col-lg-4">
                  <label for = 'productCode'>Product Key</label>
                  <input title="You need the product key to enter it in the inventory." class="form-control" name = "productCode" type="text"  class= "" required />
                  
                </div>
                </div>
                <div class="row text-center">
                  <div class="col-lg-4">
                    <label for = 'quantity'>Quantity</label>
                    <input class="form-control" min="0" max="99" name = "quantity" type= "number" class= "" required />
                    <br>
                      <div class="col-md-12 text-center">
                    <button class="btn btn-info" type="submit" >Add to Stock</button>
                    <input type="button" value="Regresar" class="btn btn-danger" onclick="location.href='{{url('stock')}}'"/>
                      </div>
            </form>
          </div>
        </div>
    </section>
    </section>
  </body>
</html>