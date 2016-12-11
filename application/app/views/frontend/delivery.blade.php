            @include('frontend.includes.navbar')


        <!-- Start main-content -->
        <section id="register-header">
        <div class="container">
          <div class="delivery-title">
                    <h1>Stipina dostava</h1>
                </div>
        </div>
                
            </section>
     
        <!--container2-->
        
        
          
            <div class="container cart-container-margin-top delivery-container ">
            <div class="row">
            <div class="col-md-6">
            <div class="delivery-text-bg"><h1 class="delivery-content-title">Stipina dostava</h1>
            <p class="delivery-content-text ">Praesent interdum mollis neque. In egestas nulla eget pede. Integer eu purus sed diam dictum scelerisque. Morbi cursus velit et felis.
Maecenas <span class="delivery-span-green">faucibus aliquet erat</span>. In aliquet rhoncus tellus. Integer auctor nibh a nunc fringilla tempus. Cras <span class="delivery-span-red">turpis urna</span>, dignissim vel.</p></div>
                            <div class="cart-form-column-bg" style="min-height: 400px;">
                           <div class="row cart-form-center padding-top-30">
                                <div class="col-md-12 ">
                             {{ Form::text('first_name', '', ['class' => 'form-control radionice-form-control textinput-400','id' => 'title', 'placeholder' => 'Ime']) }}
                                </div>
                            </div>
                            <div class="row cart-form-center">
                                <div class="col-md-12 ">
                             {{ Form::text('last_name', '', ['class' => 'form-control radionice-form-control textinput-400', 'style' => 'margin-bottom: 35px' ,'id' => 'title', 'placeholder' => 'Prezime']) }}
                                </div>
                            </div>
                            <div class="row cart-form-center">
                                <div class="col-md-12 ">
                             {{ Form::text('email', '', ['class' => 'form-control radionice-form-control textinput-400', 'id' => 'title', 'placeholder' => 'Email']) }}
                                </div>
                            </div>
                            <div class="row cart-form-center">
                                <div class="col-md-12 ">
                             {{ Form::text('phone', '', ['class' => 'form-control radionice-form-control textinput-400', 'id' => 'title', 'placeholder' => 'Mobitel']) }}
                                </div>
                            </div>
                             <div class="row cart-form-center">
                                <div class="col-md-12 ">
                             {{ Form::text('city', '', ['class' => 'form-control radionice-form-control textinput-400', 'id' => 'id', 'placeholder' => 'Grad']) }}
                                </div>
                            </div>
                  <a href="#" class="btn delivery-sign-button">Prijavi se</a> 
                  </div>
               </div>

               <div class="col-md-6 cart-row-margin-top">
                           <div class="row">
                             <div class="col-md-7"><h1 class="delivery-content-title">Zagreb</h1>
                             <h3 class="delivery-under-city">Gradska tržnica, Kvartic</h3></div>
                             <div class="col-md-5"><h1 class="delivery-date">28. lipnja</h1></div>
                           </div>
                           <div class="row margin-top30">
                             <div class="col-md-7"><h1 class="delivery-content-title">Pula</h1>
                             <h3 class="delivery-under-city">Ime nekog trga</h3></div>
                             <div class="col-md-5"><h1 class="delivery-date">10. prosinca</h1></div>
                           </div>
                           <div class="row margin-top30">
                             <div class="col-md-7"><h1 class="delivery-content-title">Krk</h1>
                             <h3 class="delivery-under-city">Perina ulica</h3></div>
                             <div class="col-md-5"><h1 class="delivery-date">18. i 19. prosinca</h1></div>
                           </div>
                           <div class="row margin-top30">
                             <div class="col-md-7"><h1 class="delivery-content-title">Zadar</h1>
                             <h3 class="delivery-under-city">Gradska tržnica</h3></div>
                             <div class="col-md-5"><h1 class="delivery-date">22. prosinca</h1></div>
                           </div>
                           <div class="row margin-top30">
                             <div class="col-md-7"><h1 class="delivery-content-title">Makarska</h1>
                             <h3 class="delivery-under-city">Opet ime nekog trga</h3></div>
                             <div class="col-md-5"><h1 class="delivery-date">24. prosinca</h1></div>
                           </div>
                     </div>
              </div>

  
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
    data: {quantity: '1'},
    success: function(data) {
      if (data.success == true) {
        var itemCount = Object.keys(data.cartitems).length;
        var totalPrice = 0;
      

        $("#cart-item-list").html("");
        $("#total-price").html("");
        for(i=0; i < itemCount; i++ ){
    
            totalPrice = data.cartitems[i].subtotal + totalPrice;
         
          $("#cart-item-list").append(' <div class="row cart-item-border"><div class="col-md-3" style="padding-left: 0;"><div class="cart-list-img"></div></div><div class="col-md-9"><h3>'+data.cartitems[i].name+'</h3><div class="cart-item-options"><p>Količina: '+data.cartitems[i].qty+'</p><p style="margin-bottom: -20px;">Cijena: '+data.cartitems[i].price+'kn</p><a href="#">Obriši</a></div></div></div>');

        }
        $('#total-price').append('<b>Ukupno:</b> '+totalPrice+'kn')
       
        
       
      } else {
        alert('Cannot find info');
      }

    },
    error: function(jqXHR, textStatus, errorThrown) {}
  });

    }

    });

$("#addToCart").click(function() {

  $.ajax({
    url: '/ajax/addToCart/' + '{{$entry->id}}',
    type: 'get',
    data: {quantity: '1'},
    success: function(data) {
      if (data.success == true) {
        $("#cartCount").text(data.total_count);
        $('#item-added').show();   
        $('#item-added').delay(1500).fadeOut();     
      } else {
        alert('Cannot find info');
      }

    },
    error: function(jqXHR, textStatus, errorThrown) {}
  });
});

</script>



            @include('frontend.includes.footer')