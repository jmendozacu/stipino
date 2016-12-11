
        <header class="header">
            <div class="header-top bg-grain sm-text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="widget no-border">
                                <ul class="list-inline sm-text-center mt-20 navigation-upper-items">
                                    <li>
                                        <a href="{{ URL::route('aboutUs') }}" class="upper-menu-left">O nama</a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::route('frontBlog') }}" class="upper-menu-left">Blog</a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::route('contact') }}" class="upper-menu-left">Kontakt</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="widget no-border">
                                <ul class="list-inline sm-text-center mt-20 text-right navigation-upper-items">
                                 @if (Auth::guest())
 
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#loginModal" class="upper-menu-left"><i class="fa fa-sign-in" aria-hidden="true"></i> Prijava</a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::route('getRegister') }}" class="upper-menu-left"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Registracija</a>
                                    </li>
                                     @endif
                                       @if (!Auth::guest())
 
                                          @if (Auth::user()->user_group=='admin')
                                                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" style="color: #939824;">
                                           <i class="fa fa-user" aria-hidden="true"></i> Moj račun
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right dropdown">
                                            <li><a href="{{ URL::route('getDashboard') }}">Administracija</a></li>
                                              <li><a href="{{ URL::route('signout') }}">Odjava</a></li>
                                            </ul>

                                    <li>
                                        <a href="{{ URL::route('signout') }}" class="upper-menu-left"><i class="fa fa-sign-out" aria-hidden="true"></i> Odjava</a>
                                    </li>
                                                @endif

                                         @endif
                                       @if (!Auth::guest())
 
                                          @if (Auth::user()->user_group=='user')
                                           Dobro došli, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}

                                              <li>
                                        <a class="upper-menu-left"><i class="fa fa-user" aria-hidden="true"></i> Moj račun</a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::route('signout') }}" class="upper-menu-left"><i class="fa fa-sign-out" aria-hidden="true"></i> Odjava</a>
                                    </li>
                                                @endif

                                         @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                      </div>
            </div>
            <div class="bg-grain">
            {{ HTML::image('img/frontend/navbar/line.png', 'line', array('class' => 'line-nav'))}}
             </div>
            <nav class="navbar navbar-default bg-grain">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span> MENI
                        </button>
                        <div class="menuzord-brand"><a href="{{ URL::route('getlanding') }}"> {{ HTML::image('img/frontend/navbar/logo.png')}}</a> </div>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navigation-menu">
                            <li><a href="/">Naslovnica</a></li>
                            <li><a href="{{ URL::route('productslist') }}">Proizvodi</a></li>
                            <li><a href="{{ URL::route('accommodation') }}">Smještaj</a></li>
                            <li><a href="{{ URL::route('workshop') }}">Radionice</a></li>
                            <li> 
                                <a href="#" class="navbar-cart-margin" id="cart"><div class="navbar-cart-hover" >
                                    <div class="cart-item-counter">
                                        <p id="cartCount"></p>
                                    </div>
                                </div></a>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </nav>
        </header>
        <section id="cart_list" class="container displaynone">
    <div class="cart-item-container triangle-isosceles" >
    <ul id="cart-item-list"></ul>
   

  
    <a href="{{ URL::route('cart') }}" class="btn btn-primary btn-checkout">Checkout <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
    <a class="cart-total-cost" id="total-price"></a>

    </div>
</section>
          <div class="modal fade" id="loginModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
    <div id="login">
        <div class="row">
            <div class="col-md-3">
                <h3>Prijava</h3>
            </div>
            <div class="col-md-1 col-md-offset-7">
                <a href="#" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="text-center">
                <p>Prijavite se putem servisa</p>
            </div>
        </div>
        <div class="row">
            <a href="#">
                <div class="facebook-signin"><i class="fa fa-facebook" aria-hidden="true"></i>
                    <p>Sign in with Facebook</p>
                </div>
            </a>
        </div>
        <div class="row">
            <a href="#">
                <div class="google-signin"><i class="fa fa-google-plus" aria-hidden="true"></i>
                    <p>Sign in with Google</p>
                </div>
            </a>
        </div>
        <div class="row">
            <div class="text-center">
                <p>ili unesite svoj email i lozinku</p>
            </div>
        </div>
       {{ Form::open(array('route' => 'signin', 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => false)) }}
        <div class="row">
             {{ Form::text('email', null, array('id' => 'email', 'class' => 'form-control register-form-control', 'placeholder'=>'Vaš email', 'required')) }}
              @if (isset($errors) && ($errors->first('email') != '' || $errors->first('email') != null))
              <p><em>{{ $errors->first('email') }}</em></p>
              @endif
        </div>
        <div class="row">
              {{ Form::password('password', array('id' => 'password', 'class' => 'form-control register-form-control', 'placeholder'=>'Vaša lozinka', 'required')) }}
                @if (isset($errors) && ($errors->first('password') != '' || $errors->first('password') != null))
                <p><em>{{ $errors->first('password') }}</em></p>
                @endif
        </div>
        <div class="row">
            <div>
                <a href="#">
                    <p>Zaboravili ste lozinku?</p>
                </a>
            </div>
        </div>
        <div class="row">
        {{ Form::button('Prijavite se', array('type' => 'submit', 'class' => 'btn button-about')) }}
        </div>
        {{ Form::close() }}
    </div>
      
    </div>
  </div>


  