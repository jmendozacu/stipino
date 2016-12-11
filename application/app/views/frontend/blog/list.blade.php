
    
      @include('frontend.includes.navbar')
        <!-- Start main-content -->
        <div class="blog-header">
        <div class="container">
            <div class="blog-header-title">
                <p>Blog</p>
            </div>
            </div>
        </div>
        <div class="container blog-container-margin">
            <!--blog content1 start-->
            @foreach ($blogpost as $entry)
            <div class="row blog-content-margin">
                <div class="col-md-3 col-sm-3 col-xs-3 blog-row-clear-col-padding ">
                    <div class="blog-content-image">{{ HTML::image(URL::to('/') . '/uploads/frontend/blog/thumbs/' . $entry->image, $entry->title) }}</div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <h1 class="blog-content-title">{{ $entry->title }}</h1>
                    <p class="blog-content-text">{{ $entry->intro }}</p>
                    <a href="{{ URL::route('blogPost', array('permalink' => $entry->permalink)) }}" class="blog-more-button">Više...</a>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <div class="blog-content-divider"></div>
                    <p class="blog-content-date"><i class="fa fa-clock-o blog-clock-icon-color" aria-hidden="true"></i> 12. rujna, <br>{{ $entry->created_at }}
                        <br>Ponedjeljak</p>
                </div>
            </div>
            @endforeach

          
            <div class="blog-pages">
 
                {{ $blogpost->links() }}
 
            </div>
        </div>
        <div class="blog-tag-cloud">
            <div class="container">
                <div class="row blog-tag-cloud-row">
                    <div class="col-md-3 col-sm-3">
                        <h1 class="blog-tag-cloud-title">TAG</h1>
                        <h1 class="blog-tag-cloud-title2">CLOUD</h1></div>
                    <div class="col-md-9 col-sm-9 blog-tag-cloud-tags">
                    @foreach($blogcategories as $blogcategory)
                        <a href="{{ URL::route('blogPostsByCategory', array('id' => $blogcategory->id)) }}">#{{$blogcategory->title}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
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
 