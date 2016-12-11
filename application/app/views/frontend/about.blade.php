 
    
      @include('frontend.includes.navbar')
       <section id="about-header">
        <video id="bgvid" playsinline loop>
            <!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->
            <source src="video/stipo.webm" type="video/webm">
        </video>
        <div class="container">
        <div class="about-title">
            <h1>O nama</h1>
        </div>
        </div>
        <a href="#" title="Play video" class="play"></a>
    </section>
    <section id="about-main-text">
        <div class="container">
            <div class="row">
                <h2>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt. Aliquam elit ante, malesuada id, tempor eu, gravida id, odio.</h2>
            </div>
        </div>
    </section>
    <section id="about-story">
        <div class="container">
            <div class="row">
                <h3 class="text-center">Kako je sve počelo?</h3>
                <div class="col-md-6 text-center">
                    <img src="images/blog/stipo-post.jpg">
                </div>
                <div class="col-md-6">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.
                        <br>
                        <br>Aliquam elit ante, malesuada id, tempor eu, gravida id, odio. Maecenas suscipit, risus et eleifend imperdiet. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.
                    </p>
                </div>
                <div class="col-md-12">
                    <h3>Kako se nastavilo</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.
                        <br>
                        <br>Aliquam elit ante, malesuada id, tempor eu, gravida id, odio. Maecenas suscipit, risus et eleifend imperdiet. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.</p>
                </div>
                <div class="col-md-12">
                    <h3>I onda je krenulo drukcije</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.</p>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12 videowrapper">
                        <iframe width="560" height="350" src="https://www.youtube.com/embed/9sEI1AUFJKw" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12 videowrapper">
                        <iframe width="560" height="350" src="https://www.youtube.com/embed/e6EkA19TTis" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-12">
                    <p>Aliquam elit ante, malesuada id, tempor eu, gravida id, odio. Maecenas suscipit, risus et eleifend imperdiet. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.</p>
                </div>
            </div>
        </div>
    </section>
    <section id="about-videowell">
        <div class="container-video">
            <div class="row">
                <div class="col-md-4">
                    <div class="col-md-12 videowrapper">
                        <iframe width="560" height="350" src="https://www.youtube.com/embed/9sEI1AUFJKw" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12 videowrapper">
                        <iframe width="560" height="350" src="https://www.youtube.com/embed/e6EkA19TTis" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12 videowrapper">
                        <iframe width="560" height="350" src="https://www.youtube.com/embed/9sEI1AUFJKw" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="about-endword">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>Aliquam elit ante, malesuada id, tempor eu, gravida id, odio. Maecenas suscipit, risus et eleifend imperdiet. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.</p>
                </div>
            </div>
        </div>
    </section>
 @include('frontend.includes.footer')
    <script>
    var vid = document.getElementById("bgvid");
    var pauseButton = document.querySelector("#about-header a");

    function vidFade() {
        vid.classList.add("stopfade");
    }

    vid.addEventListener('ended', function() {
        // only functional if "loop" is removed 
        vid.pause();
        // to capture IE10
        vidFade();
    });


    pauseButton.addEventListener("click", function() {
        vid.classList.toggle("stopfade");
        if (vid.paused) {
            vid.play();
            pauseButton.innerHTML = "";
        } else {
            vid.pause();
            pauseButton.innerHTML = "";
        }
    })
    $(document).ready(function() {
        var icon = $('.play');
        icon.click(function() {
            icon.toggleClass('active');
            return false;
        });
    });
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
        console.log('right after:'+totalItemCount);
       $('#cart-item-list').on('click', '.delete',function(){
        var product_id = $(this).data('id');
        var product_value = $(this).data('totalvalue');
        var product_quantity = $(this).data('quantity');
        var product_rowid = $(this).data('rowid');
       
        console.log('right before:'+totalItemCount);
        totalItemCount = (totalItemCount-product_quantity);
        totalPrice = (totalPrice-product_value);
        console.log('after:'+totalItemCount);

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

