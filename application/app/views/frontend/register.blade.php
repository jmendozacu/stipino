            @include('frontend.includes.navbar')
             <section id="register-header">
                <div class="register-title">
                    <h1>Registracija</h1>
                </div>
            </section>
            <section id="register">
                <div class="row register-color">
                    <div class="container">
                        <div class="col-md-6">
                        <div class="row">
                            <h3>Praesent interdum egestas nulla:</h3>
                        </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="#">
                                        <div class="facebook-signin"><i class="fa fa-facebook fa-size15" aria-hidden="true"></i>
                                            <p>Facebook</p>
                                        </div>
                                    </a>
                                </div>
                            <div class="col-md-6">
                                    <a href="#">
                                        <div class="google-signin"><i class="fa fa-google-plus fa-size15" aria-hidden="true"></i>
                                            <p>Google</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                    <h3>Ili popunite blabla eu purus sed diam dictum scelerisque:</h3>
                            </div>
                        </div>
                        <div class="col-md-6 about">
                            <img src="img/frontend/stipe-o-nama.jpg">
                            <h4>Zašto se registrirati</h4>
                        </div>
                    </div>
                </div>
            </section>
            <section id="fb-social">
                <div class="row">
                    <div class="container">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                            {{ Form::open(array('route' => 'postRegister', 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}

                             {{ Form::select('gender', array('gda' => 'gda / gdica', 'gdin' => 'gdin'), 'gda', array('class'=>'form-control register-form-control margin-top30 ','style'=>'' )) }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                             {{ Form::text('first_name', '', ['class' => 'form-control register-form-control register-form-margin-top', 'id' => 'first_name', 'placeholder' => 'Ime']) }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                             {{ Form::text('last_name', '', ['class' => 'form-control register-form-control register-form-margin-top', 'id' => 'last_name', 'placeholder' => 'Prezime']) }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                             {{ Form::text('email', '', ['class' => 'form-control register-form-control register-form-margin-top', 'id' => 'email', 'placeholder' => 'Email']) }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                             {{ Form::password('password', ['class' => 'form-control register-form-control register-form-margin-top', 'id' => 'password', 'placeholder' => 'Lozinka']) }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                             {{ Form::password('repeat_password', ['class' => 'form-control register-form-control register-form-margin-top', 'id' => 'repeat_password', 'placeholder' => 'Ponovite lozinku']) }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                             {{ Form::text('address', '', ['class' => 'form-control register-form-control register-form-margin-top', 'id' => 'address', 'placeholder' => 'Ulica i broj']) }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                             {{ Form::text('zip', '', ['class' => 'form-control register-form-control register-form-margin-top', 'id' => 'zip', 'placeholder' => 'Poštanski broj']) }}
                                </div>
                            </div>
                           
                            <div class="row">
                                <div class="col-md-12">
                              {{ Form::select('city', ['' => 'Mjesto'] + $citylist, isset($city) ? $city : null, array('class' => 'form-control selectpicker register-form-control register-form-margin-top', 'style' => 'width:100%', 'id' => 'id')) }}
                                </div>
                            </div>
                           
                            <div class="row">
                                <div class="col-md-12">
                             {{ Form::text('date_of_birth', '', ['class' => 'form-control register-form-control register-form-margin-top', 'id' => 'date_of_birth', 'placeholder' => 'Datum rođenja*']) }}
                             <p>Molimo, ostavite podatak ako zelite da vas iznenadimo posebnim poklonom.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                             {{ Form::text('phone', '', ['class' => 'form-control register-form-control register-form-margin-top', 'id' => 'phone', 'placeholder' => 'Mobitel']) }}
                                </div>
                            </div>
                            <div class="row">
                              {{ Form::button('Prijavite se', array('type' => 'submit', 'class' => 'btn button-about register-form-margin-top')) }}
                            {{ Form::close() }}
                            </div>
                        </div>
                        <div class="col-md-6 pull-about">
                            <p>Iako je odrastao u obitelji pravnika, sa planom da nastavi tradiciju, Stipe je odlucio napustiti obiteljski posao i iskoristiti jedino što je imao u životu - racunalo i komad zemlje.</p>
                        </div>
                        <div class="row">
                                <div class="col-xs-12 col-md-6 margin-top30">
                                @foreach($workshops as $workshop)
                                <a href="{{ URL::route('workshop') }}">
                                <div class="radionice-first-activity-register" style="background-image:url('{{URL::asset('uploads/frontend/workshops/thumbs/' . $workshop->image . '')}}">
                                <div class="homepage-first-under-slider-div"><p class="homepage-first-under-slider-radionice">{{ $workshop->title }}</p>
                                    <p class="homepage-under-slider-radionice">{{ $workshop->intro }}</p> </div>
                                </div>
                              </a> 
                         @endforeach
                            </div>
                        </div>
                        
                    </div>
                    </div>
            </section>
            
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


</script>


            @include('frontend.includes.footer')