       @include('frontend.includes.navbar')

        <div class="proizvodi-header">
        <div class="container">
            <div class="proizvodi-header-title">
                <p>{{ $pagetitle }}</p>
            </div>
            </div>
        </div>
        <!--proizvodi green bar -->
        <div class="proizvodi-green-bar">

            <div class="proizvodi-align-options">
               <a href="{{ URL::route('productslist') }}">
                    <p class="proizvodi-green-bar-options">Svi proizvodi</p>
                </a>
                @foreach($productcategories as $category)
                <a href="{{ URL::route('productspercategory', array('category' => $category->permalink)) }}">
                    <p class="proizvodi-green-bar-options">{{ $category->title }}</p>
                </a> 
                @endforeach 
            </div>
        </div>
        <!--end proizvodi green bar -->
        <!--container1-->

        <div class="container proizvodi-container1-margins">
            <div class="row proizvodi-row-margin-top">
                @if (count($entries) > 0) 
                    @foreach($entries as $entry) 
                        <a href="{{ URL::route('product', array('permalink' => $entry->permalink)) }}">
                            <div class="col-md-4 col-sm-6" style="max-height:300px; margin-bottom:30px;">
                                <div class="proizvodi-item-small" style="background-image:url('{{URL::asset('uploads/frontend/products/thumbs/' . $entry->image . '')}}">
                                    <div class="proizvodi-item-name-bg">
                                        <p class="proizvodi-item-title-text">{{ $entry->title}}</p>
                                    </div>
                                    @if($entry->sale_price > 0)
                                    <div class="proizvodi-price-circle">
                                        <p class="proizvodi-real-price">{{ $entry->sale_price }} kn</p>
                                        <p class="proizvodi-current-price">{{ $entry->price }} kn</p>
                                    </div>
                                    @else
                                     <div class="proizvodi-price-circle-green">
                                        <p class="proizvodi-current-price-green">{{ $entry->price }} kn</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </a>
                    @endforeach
                    @else
                        <p class="no-products">Nema proizvoda koji zadovoljavaju kriterije, probajte sa nekom drugom kategorijom</p>
                    @endif

            </div>

            <div class="text-center">

                                {{ $entries->links() }}
            </div> 

              
        </div>

        

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