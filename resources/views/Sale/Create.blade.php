<!DOCTYPE html>
<html lang="en">
<head>
  <title>SALE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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



<section class="container-fluid">
  <section  class="row justify-content-center">
      <div class="col-md-4">
          <div id="ui">
              <h3 class="text-center">Choose your product </h3>
                <form class="form-group" action="{{url('/sale')}}" method="POST">
                    {{csrf_field()}}

                    <div class="row text-center">
                      <div class="col-lg-4">
                        <label id="label-m"   for ='mecanic'>Mecanic</label>
                        <input class="form-control" name ="mecanics" id="mecanic" placeholder="Ingresa un nombre" type= "text" class= ""  />                      
                        <div id="listMecanic"></div>
                      </div>
                     
                    </div>
                    <div id="listMecanic"></div>
                    <div class="row text-center">
                      <div class="col-lg-4">
                        <label id="label-e" for ='electric'>Electric</label>
                        <input class="form-control" name ="electrics" id="electric" placeholder="Ingresa un nombre" type= "text" class= ""  />
                        <div id="listElectric"></div>
                        
                      </div>
                    </div>
                    <div class="row text-center">
                      <div class="col-lg-4">    
                        <label id="label-i"  for ='iluminate'>Ilumination</label>
                        <input class="form-control" name ="iluminations" id="iluminate" placeholder="Ingresa un nombre" type= "text" class= ""  />
                        <div id="listIlumination"></div>
                        <label id="quantityI" for = 'quantity'>Quantity</label>
                        <input  class="form-control" min="0" max="99"  name = "quantity" id="quantity" type= "number" class= ""  />
                      </div>
                    </div>
                    <br>
                    <div class="row text-center">
                      <div class="col-lg-4">
                        <div class="row text-center">
                          <div class="col-lg-4">
                            <select title="Select the type of Part you are looking for." id="article" class="form-control" name="type">
                              <option value="" class= "selected"  >Select type</option>
                              <option value="Electricas" class= ""  >Electrics</option>
                              <option value="Mecanicas" class= ""  >Mecanics</option>
                              <option value="Iluminacion" class= ""  >Iluminatión</option>
                              </select>
                          </div>
                        </div>
                        <br>
                    <input type="submit" value="Save"  name="save" id="save" class="btn btn-primary" />
                      <input type="button" value="Back" onclick="location.href='{{url('sale')}}'" class="btn btn-danger"  />
                </form>
              </div>
            </div>
        </section>
    </section>
  </body>
</html>

<script>

  $(document).ready(function () {
    var count = 1;
    var init = 1;
   
    HideFields();
    

    $("#mecanic").keyup(function () { 
      
      var _query = $(this).val();
      if(_query != ''){
        var _token = $("meta[name='csrf-token']").attr("content");

        $.ajax({
          url:"{{route('sale.fetchM')}}",
          method:"POST",
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

          data:{
                'query':_query
                },
          success: function (data) {
              $('#listMecanic').fadeIn();
              $('#listMecanic').html(data);
            }

        })
      }
    }); 
    
    $("#electric").keyup(function () { 
      
      var _query = $(this).val();
      if(_query != ''){
        var _token = $("meta[name='csrf-token']").attr("content");

        $.ajax({
          url:"{{route('sale.fetchE')}}",
          method:"POST",
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

          data:{
                'query':_query
                },
          success: function (data) {
              $('#listElectric').fadeIn();
              $('#listElectric').html(data);
            }

        })
      }
    }); 

    
    $("#iluminate").keyup(function () { 
      
      var _query = $(this).val();
      if(_query != ''){
        var _token = $("meta[name='csrf-token']").attr("content");

        $.ajax({
          url:"{{route('sale.fetchI')}}",
          method:"POST",
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

          data:{
                'query':_query
                },
          success: function (data) {
              $('#listIlumination').fadeIn();
              $('#listIlumination').html(data);
            }

        })
      }


    }); 

    function HideFields(){
    //Labels
       
      $('#label-e').fadeOut();
      $('#label-m').fadeOut();
      $('#label-i').fadeOut();

      $('#quantityI').fadeOut();

      //inputs
      $('#quantity').fadeOut();
     

      $('#mecanic').fadeOut();
      $('#electric').fadeOut();
      $('#iluminate').fadeOut();      
    }

    $('#article').mouseleave(function () { 
            

            if($(this).val() == 'Mecanicas')
            {
            
              $('#electric').fadeOut();
              $('#iluminate').fadeOut();
              $('#mecanic').fadeIn();
              
              
            $('#quantityI').fadeIn();
            $('#quantity').fadeIn();
            
             
              $('#label-e').fadeOut();
              $('#label-m').fadeIn();
              $('#label-i').fadeOut();


            
              
            }
            if($(this).val() == 'Electricas')
            {
            
              $('#mecanic').fadeOut();
              $('#iluminate').fadeOut();
              $('#electric').fadeIn();
              
              $('#quantityI').fadeIn();

              $('#quantity').fadeIn();
              
              
              $('#label-e').fadeIn();
              $('#label-m').fadeOut();
              $('#label-i').fadeOut();

              
            }
            if($(this).val() == 'Iluminacion')
            {
            
              $('#electric').fadeOut();
              $('#mecanic').fadeOut();
              $('#iluminate').fadeIn();

              $('#quantityI').fadeIn();
            
              $('#quantity').fadeIn();
              
              $('#label-e').fadeOut();
              $('#label-m').fadeOut();
              $('#label-i').fadeIn();



            }
            if(($(this).val() == ''))
            {
              HideFields();
            }
            
          });
     });
      

      $(document).on('click','li',function () { 
        
        var chooseType=$("#article").val();

        if(chooseType == 'Mecanicas'){
          $("#mecanic").val($(this).text());
            $("#listMecanic").fadeOut();
        }

        if(chooseType == 'Electricas'){
          $("#electric").val($(this).text());
            $("#listElectric").fadeOut();
        }

        if(chooseType == 'Iluminacion'){
          $("#iluminate").val($(this).text());
            $("#listIlumination").fadeOut();
        }
        $( function() {
          $( document ).tooltip();
        });
  });
</script>

