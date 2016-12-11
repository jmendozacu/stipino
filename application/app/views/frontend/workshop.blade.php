            @include('frontend.includes.navbar')


        <!-- Start main-content -->
        <div style="background: url(../img/frontend/radionice/radionice-header.png); background-repeat: no-repeat; width: 100%; height: 325px;
                    background-size: cover;">
                    <div class="container">
            <div class="radionice-header-title">
                <p>Radionice</p>
            </div>
            </div>
        </div>
        <!--container1-->
        <div class="container radionice-container-margins">
        <?php $i = 0;?>
        @foreach($entries as $entry)
        <?php $i++?>
        @if($i % 2 == 0)
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="radionice-div-margin-top ">
                        <hr class="radionice-divider">
                        <h2 class="radionice-div-title">{{ $entry->title }}</h2>
                        <hr class="radionice-divider">
                        <span class="input-group-btn radionice-btn-group-margin ">
                            <button class="btn btn-default radionice-button-text-color radionice-button-size" type="button">Prijavi se</button>
                        </span>
                    </div>
                    <p class="radionice-row-content">{{ $entry->content }}</p>
                   <div class="social-wrokshop-wrapper" style="background-color:transparent;">
                    <div>
                        <a href="#" class="radionice-facebook"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
                        <a href="#" class="radionice-googleplus"><i class="fa fa-google-plus" aria-hidden="true"></i> Google+</a>
                    </div>
                        <div class="social-margin-top30"> <a href="#" class="radionice-twitter"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
                        <a href="#" class="radionice-email"><i class="fa fa-envelope" aria-hidden="true"></i> Email</a></div>
                       
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 radionice-padding-left-clear">
                    <div class="radionice-image-article" style="background-image:url('{{URL::asset('uploads/frontend/workshops/' . $entry->image . '')}}">
                </div>
            </div>
            </div>
            @else
             <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 pull-right">
                    <div class="radionice-div-margin-top">
                        <hr class="radionice-divider">
                        <h2 class="radionice-div-title">{{ $entry->title }}</h2>
                        <hr class="radionice-divider">
                        <span class="input-group-btn radionice-btn-group-margin ">
                            <button class="btn btn-default radionice-button-text-color radionice-button-size" type="button">Prijavi se</button>
                        </span>
                    </div>
                    <p class="radionice-row-content">{{ $entry->content }}</p>
                    <div class="social-wrokshop-wrapper" style="background-color:transparent;">
                    <div>
                        <a href="#" class="radionice-facebook"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
                        <a href="#" class="radionice-googleplus"><i class="fa fa-google-plus" aria-hidden="true"></i> Google+</a>
                    </div>
                        <div class="social-margin-top30"> <a href="#" class="radionice-twitter"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
                        <a href="#" class="radionice-email"><i class="fa fa-envelope" aria-hidden="true"></i> Email</a></div>
                       
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 radionice-padding-right-clear">
                    <div class="radionice-image-article" style="background-image:url('{{URL::asset('uploads/frontend/workshops/' . $entry->image . '')}}">
                </div>
            </div>
            </div>
            @endif
             @endforeach 
        
        </div>

        <!--end container1-->
        <!--container2-->
        
        <div style="background-color: #879d00; height: 500px; width: 100%; background-image: url(../img/frontend/radionice/arrows.png);
                    background-repeat: no-repeat; background-position: center; background-position-y: 40px; font-family: 'Lato'; font-weight: bold; ">
          <div class="row">
           {{ Form::open(array('route' => 'postWorkshopEntry', 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}

            <div class="container">
                             {{ Form::select('workshop_id', $workshopslist, isset($entry->workshop) ? $entry->workshop : null, array('class' => 'form-control radionice-form-control margin-top30','style'=>'margin:50px auto; width: 350px; text-align:center;', 'id' => 'workshop_id', 'required')) }} 
                <div class="row radionice-form-center ">
                                <div class="col-md-12 radionice-form-size">
                             {{ Form::text('first_name', '', ['class' => 'form-control radionice-form-control textinput-400','id' => 'first_anme', 'placeholder' => 'Ime']) }}
                                </div>
                            </div>
                            <div class="row radionice-form-center">
                                <div class="col-md-12 radionice-form-size">
                             {{ Form::text('last_name', '', ['class' => 'form-control radionice-form-control textinput-400', 'style' => 'margin-bottom: 35px' ,'id' => 'last_name', 'placeholder' => 'Prezime']) }}
                                </div>
                            </div>
                            <div class="row radionice-form-center">
                                <div class="col-md-12 radionice-form-size">
                             {{ Form::text('address', '', ['class' => 'form-control radionice-form-control textinput-400', 'id' => 'address', 'placeholder' => 'Ulica i broj']) }}
                                </div>
                            </div>
                            <div class="row radionice-form-center">
                                <div class="col-md-12 radionice-form-size">
                             {{ Form::text('zip', '', ['class' => 'form-control radionice-form-control textinput-400', 'id' => 'zip', 'placeholder' => 'Poštanski broj']) }}
                                </div>
                            </div>
                <span class="input-group-btn radionice-btn-group-margin ">
                            
                            {{ Form::button('Prijavi se', array('type' => 'submit', 'class' => 'btn btn-default radionice-button-text-color radionice-button-size radionice-form-button-grey')) }}
                        </span>
                        
            </div>
            {{ Form::close() }}
          </div>
        </div>
 
        <!--end container2-->
        <!--container3-->
        <div class="container radionice-container3-margin-bot">
            <h2 class="radionice-activities-title"><i class="fa fa-fort-awesome radionice-fort-size" aria-hidden="true"></i>
 Dodatne aktivnosti</h2>
            <div class="row radionice-activity-row-margin">
             @foreach($entries as $entry)
                <div class="col-md-4 radionice-activity-text-align">
                    <div class="radionice-first-activity" style="background-image:url('{{URL::asset('uploads/frontend/workshops/thumbs/' . $entry->image . '')}}">
                    <div><p class="radionice-first-activity-title">{{ $entry->title }}</p>
                        <p class="radionice-under-activity-title">{{ $entry->intro }}</p></div>
                        
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!--end container3-->
        <!--End main-content-->



 <div class="alert alert-success item-added-success displaynone" id="item-added">
  <strong>Uspješno!</strong> Dodan novi proizvod u košaricu.
</div>


<div class="alert alert-warning item-added-success displaynone" id="item-destroyed">
  <strong>Izbrisano!</strong> Obrisali ste proizvod iz košarice.
</div>     

<script type="text/javascript">
                $(document).ready(function(){
                $.ajax({
                url: '/ajax/getCartItems/',
                type: 'get',
                data: {},
                success: function(data) {
                if (data.success == true) {
                $("#cartCount").text(data.total_count);
                console.log('this was good');       
                } else {
                alert('Cannot find info');
                }

                },
             error: function(jqXHR, textStatus, errorThrown) {}
             });
                });

</script>



<script type="text/javascript">


$("#cart").click(function() {
    
    var NAME = document.getElementById("cart_list");
    var currentClass = NAME.className;
  
    if (currentClass == "container displayblock") { 
        NAME.className = "container displaynone";  
    } else {
        NAME.className = "container displayblock";

  $.ajax({
    url: '/ajax/getCartItemList/',
    type: 'get',
    data: {},
    success: function(data) {
      if (data.success == true) {
        var itemCount = Object.keys(data.cartitems).length;
        var totalPrice = 0;
        var totalItemCount = document.getElementById("cartCount").innerHTML;

      

        $("#cart-item-list").html("");
        $("#total-price").html("");
        for(i=0; i < itemCount; i++ ){
    
            totalPrice = data.cartitems[i].subtotal + totalPrice;
          

         
           
         $('#cart-item-list').append('<li><div class="row cart-item-border"><div class="col-md-3 col-sm-3 col-xs-3" style="padding-left: 0;"><div class="cart-list-img"></div></div><div class="col-md-9 col-sm-9 col-xs-9"><a href="/proizvod/'+data.cartitems[i]['options'].permalink+'"><h3>'+data.cartitems[i].name+'</h3></a><div class="cart-item-options"><p>Količina: '+data.cartitems[i].qty+'</p><p style="margin-bottom: -20px;">Cijena: '+data.cartitems[i].price+'kn</p></div></div></div>'+'<input type="submit" class="done delete cart-delete-item" value="Obriši" data-id="'+data.cartitems[i].id+'" data-totalvalue="'+data.cartitems[i].subtotal+'" data-quantity="'+data.cartitems[i].qty+'"'+' data-rowid="'+data.cartitems[i].rowid+'">'+'</li>');

        }

        $('#total-price').append('<b>Ukupno:</b> '+totalPrice+'kn')
        
      
       $('#cart-item-list').on('click', '.delete',function(){
        var product_id = $(this).data('id');
        var product_value = $(this).data('totalvalue');
        var product_quantity = $(this).data('quantity');
        var product_rowid = $(this).data('rowid');
       
     
        totalItemCount = (totalItemCount-product_quantity);
        totalPrice = (totalPrice-product_value);
      

       $(this).parent().remove();
       $("#total-price").html("");
       $('#total-price').append('<b>Ukupno:</b> '+totalPrice+'kn')
       $("#cartCount").text(totalItemCount);
        $.ajax({
        url: '/ajax/removeFromCart/' + product_rowid,
        type: 'get',
        data: {},
    success: function(data) {
      if (data.success == true) {
        $('#item-destroyed').show();   
        $('#item-destroyed').delay(1500).fadeOut();     
      } else {
        alert('Cannot find info');
      }

    },
    error: function(jqXHR, textStatus, errorThrown) {}
  });


       });

        
       
      } else {
        alert('Cannot find info');
      }

    },
    error: function(jqXHR, textStatus, errorThrown) {}
  });

    }

    });

</script>


            @include('frontend.includes.footer')