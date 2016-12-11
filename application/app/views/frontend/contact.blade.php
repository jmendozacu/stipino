 
    
      @include('frontend.includes.navbar')
    <!-- Start main-content -->
        <div class="contact-header-title">
            <p>Kontakt</p>
        </div>
           {{ Form::open(array('route' => 'postContact', 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}

        <div class="container contact-form-position">
            <div class="row  ">
                <div class="col-md-8 col-sm-8 contact-form-padding">
                    <div>
                    {{ Form::text('full_name', '', ['class' => 'form-control', 'id' => 'full_name', 'placeholder' => 'Ime i prezime']) }}
                    </div>
                    <div>
                     {{ Form::text('email', '', ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email']) }}
                        
                    </div>
                    <div>
                     {{ Form::text('phone', '', ['class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Broj telefona']) }}
                        
                    </div>
                    <div>
                     {{ Form::text('contact_message', '', ['class' => 'form-control contact-form-comment-input', 'id' => 'contact_message', 'placeholder' => 'Komentar']) }}
                       
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 contact-form-padding contact-padding-top">
                    <div class="row contact-icon-top-margin ">
                        <div class="col-md-3 col-xs-3 contact-icons-size"><i class="fa fa-map-signs" aria-hidden="true"></i></div>
                        <div class="col-md-9 col-xs-9">
                            <div>
                                <p class="contact-icon-text-size">Adresa</p>
                                <p class="contact-icon-top-margin contact-icon-text-discription">OPG Stjepan Dumančić <br /> Tomin Put 1 <br /> 31325, Čeminac </p>
                            </div>
                        </div>
                    </div>
                    <div class="row contact-icon-top-margin ">
                        <div class="col-md-3 col-xs-3 contact-icons-size"><i style="padding-left:5px;" class="fa fa-phone" aria-hidden="true"></i></div>
                        <div class="col-md-9 col-xs-9">
                            <div>
                                <p class="contact-icon-text-size">Mobitel</p>
                               <a href="tel:+385998173880" class="Blondie "> <p class="contact-icon-top-margin contact-icon-text-discription footer-number">+385 99 817 3880</p></a>
                            </div>
                        </div>
                    </div>
                    <div class="row contact-icon-top-margin ">
                        <div class="col-md-3 col-xs-3 contact-icons-size"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                        <div class="col-md-9 col-xs-9">
                            <div>
                                <p class="contact-icon-text-size">E-mail</p>
                                <a href="mailto:info@stipino.com" ><p class="contact-icon-top-margin contact-icon-text-discription contact-icon-text-discription-hover">info@stipino.com</p></a>
                            </div>
                        </div>
                    </div>
                    <div class="row contact-icon-top-margin ">
                        <div class="col-md-3 col-xs-3 contact-icons-size"><i class="fa fa-skype" aria-hidden="true"></i></div>
                        <div class="col-md-9 col-xs-9">
                            <div>
                                <p class="contact-icon-text-size">Skype</p>
                                <p class="contact-icon-top-margin contact-icon-text-discription">stjepan.dumancic</p>
                            </div>
                        </div>
                    </div>
                    <div class="row contact-icon-top-margin ">
                        <div class="col-md-3 col-xs-3 contact-icons-size"><i class="fa fa-facebook-official" aria-hidden="true"></i> </div>
                        <div class="col-md-9 col-xs-9">
                            <div>
                                <p class="contact-icon-text-size">FB fan page</p>
                                <a href="https://www.facebook.com/stipinooo" target="blank"><p class="contact-icon-top-margin contact-icon-text-discription contact-icon-text-discription-hover">www.facebook.com/stipinooo</p></a>
                            </div>
                        </div>
                    </div>
                    <div class="row contact-icon-top-margin ">
                        <div class="col-md-3 col-xs-3 contact-icons-size"><i style="padding-left:5px;" class="fa fa-map-marker" aria-hidden="true"></i> </div>
                        <div class="col-md-9 col-xs-9">
                            <div>
                                <p class="contact-icon-text-size">Lokacija(lon,lat)</p>
                                <a href="https://goo.gl/AcpqIL" target="blank"><p class="contact-icon-top-margin contact-icon-text-discription contact-icon-text-discription-hover">https://goo.gl/AcpqIL</p></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-button-div-margin">
             {{ Form::button('Pošalji', array('type' => 'submit', 'class' => 'contact-form-send-button')) }}
              
            </div>
        </div>
        {{ Form::close() }}
        <div class="container">
            <div id="map" class="contact-gm-size"></div>
        </div>
          <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-2555128-15', 'auto');
        ga('send', 'pageview');
        </script>
         
        <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    </div>
    
    <script>
      function initMap() {
        var uluru = {
            lat: 45.6699994,
            lng: 18.6730698
        };
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
     <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxNMbBiYas5FSOdJfZHmKSiviCBnlrVE0&callback=initMap">
    </script>
   


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


       
 