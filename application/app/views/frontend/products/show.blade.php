            @include('frontend.includes.navbar')

     

              <section id="register-header" style="background-image:url('{{URL::asset('uploads/frontend/products/' . $entry->cover_image . '')}}">
                <div class="register-title">
                    <h1>{{ $entry->title }}</h1>
                </div>
            </section>
            <div class="container">
            	<div class="row">
	            	<div class="col-md-12">
		            	<div class="text-center">
					 <ol class="breadcrumb">
						  <li><a href="{{ URL::route('productslist') }}">Svi proizvodi</a></li>
						  <li class="active"><a href="#">{{ $entry->title }}</a></li>
					</ol>
				</div>
	            	</div>
            	</div>
            </div>
            <div class="container">
            	<div class="row">
            		<div class="col-md-6 col-sm-6 col-xs-12">
            			{{ HTML::image(URL::to('/') . '/uploads/frontend/products/thumbs/' . $entry->image) }}
                         <div class="proizvodi-price-circle-green">
                            <p class="proizvodi-current-price-green">{{ $entry->price }} kn</p>
                        </div>
            		</div>
            		<div class="col-md-6 col-sm-6 col-xs-12 align-package-text">
            			<h3 class="product-description">{{ $entry->description }}</h3>
            			<div class="col-md-6 col-md-offset-6">
            			<span class="packaging">Pakiranje</span> <span class="package-weight">{{ $entry->joinproduct_weight }} {{ $entry->measure_unit }}</span>
            			</div>
            		</div>
                                <div class="col-md-6 col-sm-6 col-xs-12 marginleft-20">
            		<div class="row">
                                    <div class="col-md-5 col-sm-5 col-xs-6 col-md-offset-1">
                                    	<div class="display-inline-flex" style="margin-top:7px;">
                                            <div class="button-numeric" id="button_down">-</div>
                                            <input type="text" value="1" name="fname" id="total_items" class="form-control numeric-form-control" style="width: 100px; text-align: center; font-size: 18px;"><br>
                                            <div class="button-numeric" id="button_up">+</div>
                                            </div>
                                    </div>
                                    <div class="col-md-5 col-sm-5 col-xs-5 addtocart-change-width">
                                   
                                             <button id="addToCart" class="btn button-addtocart-cart cd-add-to-cart no-margin-right" data-price="{{intval($entry->price)}}">Add To Cart </button>
                                   </div>
                                </div>
                            </div>
            	       </div>

                   

            	<div class="row">
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="product-info">
                                        <a href="#"> <img src="/img/frontend/radionice-jabuke.png"></a>
                                        <h3>Okus</h3>
                                        <p>To je vrlo aromatična jabuka. Njeno bijelo meso je hrskavo i sočno, te je onog blagog.</p>
                                    </div>
                                    </div>
                                    <div class="product-info">
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <a href="#"> <img src="/img/frontend/radionice-paradajz.png"></a>
                                         <h3>Boja</h3>
                                        <p>Temeljna je žuta s pramenovima crvenila na sunčanoj strani - sorta je slabo stabilna, pa postoji niz.</p>
                                    </div>
                                    </div>
                                    <div class="product-info">
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <a href="#"> <img src="/img/frontend/radionice-paprika.png"></a>
                                        <h3>Jesenska sorta</h3>
                                        <p>Plodovi dozrijevaju od kraja kolovoza do početka rujna.</p>
                                        </div>
                                    </div>
            	</div>
            </div>
	      <section id="share-social">
        <div class="row">
            <div class="container">
                <div class="col-md-2 col-xs-12">
                    <h4>DIJELI ŠERAJ SADRŽAJ!</h4>
                </div>
                <div class="col-md-10 col-xs-12">
                    <div class="blog-social-wrapper">
                        <a href="#" class="blog-facebook-share"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
                        <a href="#" class="blog-googleplus-share"><i class="fa fa-google-plus" aria-hidden="true"></i> Google+</a>
                        <a href="#" class="blog-twitter-share"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
                        <a href="#" class="blog-email-share"><i class="fa fa-envelope" aria-hidden="true"></i> Email</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
	     <section id="comments-linked">
	        <div class="row">
	            <div class="container">
	            <div class="tabs-style">
			  <ul class="nav nav-tabs">
			    <li class="product-tabs active"><a data-toggle="tab" href="#comments">Vaši komentari</a></li>
			    <li class="product-tabs"><a data-toggle="tab" href="#linked">Vezani članci</a></li>
			  </ul>

			  <div class="tab-content product-tab-content">
			    <div id="comments" class="tab-pane fade in active">
			      <h3>HOME</h3>
			      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			    </div>
			    <div id="linked" class="tab-pane fade">
                                    @foreach($relatedposts['productposts'] as $post)
                                       <div class="row blog-content-margin">
                                    <div class="col-md-3 col-sm-3 col-xs-3 blog-row-clear-col-padding ">
                                        <div class="blog-content-image">{{ HTML::image(URL::to('/') . '/uploads/frontend/blog/thumbs/' . $post->image, $post->title) }}</div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6" >
                                        <h1 class="blog-content-title">{{ $post->title }}</h1>
                                        <p class="blog-content-text">{{ $post->intro }}</p>
                                        <a href="{{ URL::route('blogPost', array('permalink' => $post->permalink)) }}" class="blog-more-button">Više...</a>
                                    </div>
                                   <div class="col-md-3 col-sm-3 col-xs-3">
                    <div class="blog-content-divider"></div>
                    <p class="blog-content-date"><i class="fa fa-clock-o blog-clock-icon-color" aria-hidden="true"></i> 12. rujna, <br>{{ $post->created_at }}
                        <br>Ponedjeljak</p>
                      </div>
                                </div>
                                @endforeach
			          </div>
	            </div>
	        </div>
		
	    </section>


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

$("#addToCart").click(function() {
  
  $.ajax({
    url: '/ajax/addToCart/' + '{{$entry->id}}',
    type: 'get',
    data: {quantity: document.getElementById("total_items").value,
            packaging: '{{ $entry->joinproduct_weight }} {{ $entry->measure_unit }}',
            update: 'false'},
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





<script >
    var totalItems = 2;

    $("#button_up").click(function(){
            if(totalItems > 1){
        totalItems++;
        $("#total_items").val(totalItems);
        }
    });

    $("#button_down").click(function(){
        if(totalItems > 1){
        totalItems--;
        $("#total_items").val(totalItems);
         }
    });
   
</script>



            @include('frontend.includes.footer')