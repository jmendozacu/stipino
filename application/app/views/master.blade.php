<?php
/*
 *	Master template file
 *
 *	Contains variables for content input
 *	-	$title				-	string	-	Page title, for <title> and og:title (if not default)
 *	-	$css_files			-	array	-	list of additional CSS files
 *	-	$js_header_files	-	array	-	list of additional JS files
 *	-	$js_footer_files	-	array	-	list of additional JS files
 *	-	$body_content		-	boolean -	false if body tag should be empty of HTML tags, except
 *											footer JS and Google Analytics
 */
?>

<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" class="no-js">

<head>
    <meta charset="UTF-8">

	<?php
		if (isset($title))
		{
			$final_title = $title;
		}
		else
		{
			$final_title = Lang::get('core.app_title');
		}
	?>

	<title>{{ $final_title }}</title>

	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <meta name="description" content="Dentist finder">

    <meta name="keywords" content="dentist, dentist finder">

 	<meta name="author" content="Culex d.o.o., info@culex.hr">

	<link rel="icon" href="{{ URL::asset('favicon.png') }}">

	<link rel="apple-touch-icon-precomposed" href="{{ URL::asset('favicon.png') }}">

	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ URL::asset('favicon.png') }}">

	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ URL::asset('favicon.png') }}">

	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ URL::asset('favicon.png') }}">

    <!-- jQuery 2.0.2 -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

    

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	{{-- Load the Modernizr before everything, for feature detection --}}
	{{ HTML::script('js/backend/modernizr.js') }}
	{{ HTML::script('js/backend/select2.js') }}

	<!-- select2 4.0.3 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    <!-- bootstrap 3.0.2 -->

	{{ HTML::style('css/backend/bootstrap.min.css') }}

    <!-- font Awesome -->

	{{ HTML::style('css/backend/font-awesome.min.css') }}

    <!-- Ionicons -->

	{{ HTML::style('css/backend/ionicons.min.css') }}

	<!--- pickmeup.css  -->

	{{ HTML::style('css/backend/pickmeup.css') }}


    <!-- google font -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

    <!-- Theme style -->

	{{ HTML::style('css/backend/style.css') }}

    <!-- Custom style -->

	{{ HTML::style('css/backend/custom.css') }}


	{{-- Loop that implements additional CSS for a module and/or view --}}
	@if (isset($css_files) && is_array($css_files))
		@foreach  ($css_files as $css_file)
	{{ HTML::style($css_file) }}
		@endforeach
	@endif

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

	{{ HTML::script('js/backend/jquery.noty.packaged.min.js') }}
	{{ HTML::script('js/backend/noty.app.theme.js') }}

 	{{ HTML::script('js/backend/jquery.pickmeup.js') }}

 	


	{{-- Loads default path to a JS variable (no trailing slash) --}}
	<script>
	var rootPath = "{{{ url('/') }}}";
	</script>


	{{-- Loop that implements additional header JS for a module and/or view --}}
	@if (isset($js_header_files) && is_array($js_header_files))
		@foreach ($js_header_files as $js_file)
	{{ HTML::script($js_file) }}
		@endforeach
	@endif

</head>

<body class="skin-black">
    <!-- header logo: style can be found in header.less -->
    <header class="header">
        <a href="{{ URL::route('getlanding') }}" target="_blank" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-right">

            </div>
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        {{ HTML::image('img/avatar2.png', 'Stipe Dumančić', array('class' => 'img-circle')) }}
                    </div>
                    <div class="pull-left info">
                        <p>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <ul class="sidebar-menu">
                    <li>
                        <a href="{{ URL::route('getDashboard') }}">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
 					<hr>
		             <li class="treeview">
		              <a href="#"><i class="fa fa-rss"></i> <span>Blog</span> <i class="fa fa-angle-left pull-right"></i></a>
		              <ul class="treeview-menu">
		                <li><a href="{{ URL::route('BlogIndex') }}">Postovi</a></li>
		                <li><a href="{{ URL::route('CategoryIndex') }}">Kategorije</a></li>
		              </ul>
		            </li>
                    <li class="treeview">
		              <a href="#"><i class="fa fa-fire"></i> <span>Blitz post</span> <i class="fa fa-angle-left pull-right"></i></a>
		              <ul class="treeview-menu">
		                <li><a href="{{ URL::route('BlitzPostIndex') }}">Postovi</a></li>
		                <li><a href="{{ URL::route('BlitzPostCreate') }}">Napravi post</a></li>
		              </ul>
		            </li>
                    <li>
                        <a href="{{ URL::route('PagesIndex') }}">
                            <i class="fa fa-file-text"></i> <span>Stranice</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::route('MediaIndex') }}">
                            <i class="fa fa-picture-o"></i> <span>Media</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::route('WidgetIndex') }}">
                            <i class="fa fa-cogs"></i> <span>Widgets</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::route('WorkshopIndex') }}">
                            <i class="fa fa-briefcase"></i> <span>Radionice</span>
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ URL::route('ClientsIndex') }}">
                            <i class="fa fa-users"></i> <span>Klijenti</span>
                        </a>
                    </li>
                   
                    <li class="treeview {{ Route::currentRouteNamed('ProductsCreate') ? 'active' : '' }}">
		              <a  href="#"><i class="fa fa-rss"></i> <span>Proizvodi</span> <i class="fa fa-angle-left pull-right"></i></a>
		              <ul class="treeview-menu">
		                <li><a href="{{ URL::route('ProductsIndex') }}">Proizvodi</a></li>
		                <li><a href="{{ URL::route('ProductsWeightIndex') }}">Pakiranje</a></li>
		                <li><a href="{{ URL::route('ProductCategoryIndex') }}">Kategorije proizvoda</a></li>
		              </ul>
		            </li>
					
					<li class="treeview {{ Route::currentRouteNamed('OrdersIndex') ? 'active' : '' }}">
		              <a  href="#"><i class="fa fa-users"></i> <span>Narudžbe</span> <i class="fa fa-angle-left pull-right"></i></a>
		              <ul class="treeview-menu">
		                <li><a href="{{ URL::route('OrdersIndex') }}">Sve narudžbe</a></li>
		                <li><a href="{{ URL::route('SalesIndex') }}">Prodaja</a></li>
		              </ul>
		            </li>
                 
                     <li class="treeview {{ Route::currentRouteNamed('TrashIndex') ? 'active' : '' }}">
		              <a  href="#"><i class="fa fa-trash-o"></i> <span>Smeće</span> <i class="fa fa-angle-left pull-right"></i></a>
		              <ul class="treeview-menu">
		                <li class="treeview">
		              <a href="#"></i> <span>Blog</span> <i class="fa fa-angle-left pull-right"></i></a>
		              <ul class="treeview-menu">
		                <li><a href="{{ URL::route('TrashIndex', 'blogposts') }}">Postovi</a></li>
		                <li><a href="{{ URL::route('TrashIndex', 'categories') }}">Kategorije</a></li>
		              </ul>
		            </li>
		                <li><a href="{{ URL::route('TrashIndex', 'pages') }}">Stranice</a></li>
		                <li><a href="{{ URL::route('TrashIndex', 'media') }}">Media</a></li>
		                <li><a href="{{ URL::route('TrashIndex', 'widgets') }}">Widgets</a></li>
		                <li><a href="{{ URL::route('TrashIndex', 'workshops') }}">Radionice</a></li>
		                <li><a href="{{ URL::route('TrashIndex', 'clients') }}">Klijenti</a></li>
		                <li class="treeview {{ Route::currentRouteNamed('TrashIndex') ? 'active' : '' }}">
		              <a  href="#"><span>Proizvodi</span> <i class="fa fa-angle-left pull-right"></i></a>
		              <ul class="treeview-menu">
		                <li><a href="{{ URL::route('TrashIndex', 'products') }}">Proizvodi</a></li>
		                <li><a href="{{ URL::route('TrashIndex', 'productsweight') }}">Pakiranje</a></li>
		                <li><a href="{{ URL::route('TrashIndex', 'productscategories') }}">Kategorije proizvoda</a></li>
		              </ul>
		            </li>
		            <li><a href="{{ URL::route('TrashIndex', 'orders') }}">Narudžbe</a></li>
		               
		              </ul>
		            </li>
                    <hr>
                 	<li>
                        <a href="{{ URL::route('signout') }}">
                            <i class="fa fa-sign-out"></i> <span>Odjava</span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Main content -->
            <section class="content">

	          	<!-- Your Page Content Here -->

					{{ $content or null }}

 				<!-- End page content  -->

            </section>
            <!-- /.content -->

        </aside>
        <!-- /.right-side -->

       	<footer>
	      	<div class="row">
	            <div class="footer-main">
	                Copyright &copy Stipino, 2016 | Developed by <a href="http://culex.hr/" target="_blank">Culex</a>
	            </div>
	        </div>
		</footer>

    </div>

    <!-- ./wrapper -->





    <!-- Le javascript -->


 	<!-- App js -->

 	{{ HTML::script('js/backend/app.js') }}


	@if (Session::has('message'))
	<script>
	var n = noty({
		text: '{{{ Session::get('message') }}}',
		type: 'alert', // Alert, Success, Error, Warning, Information, Confirm
		theme: 'app', // or 'defaultTheme'
		layout: 'bottomRight', // top - topLeft - topCenter - topRight - center - centerLeft - centerRight - bottom - bottomLeft - bottomCenter - bottomRight
		animation: {
			open: 'animated bounceInUp',
			close: 'animated bounceOutDown',
		}
	});
	</script>
	@endif

	@if (Session::has('error_message'))
	<script>
	var n = noty({
		text: '{{{ Session::get('error_message') }}}',
		type: 'error',
		theme: 'app',
		layout: 'bottomRight',
		animation: {
			open: 'animated bounceInUp',
			close: 'animated bounceOutDown',
		}
	});
	</script>
	@endif

	@if (Session::has('info_message'))
	<script>
	var n = noty({
		text: '{{{ Session::get('info_message') }}}',
		type: 'information',
		theme: 'app',
		layout: 'bottomRight',
		animation: {
			open: 'animated bounceInUp',
			close: 'animated bounceOutDown',
		}
	});
	</script>
	@endif

	@if (Session::has('warning_message'))
	<script>
	var n = noty({
		text: '{{{ Session::get('warning_message') }}}',
		type: 'warning',
		theme: 'app',
		layout: 'bottomRight',
		animation: {
			open: 'animated bounceInUp',
			close: 'animated bounceOutDown',
		}
	});
	</script>
	@endif

	@if (Session::has('success_message'))
	<script>
	var n = noty({
		text: '{{{ Session::get('success_message') }}}',
		type: 'success',
		theme: 'app',
		layout: 'bottomRight',
		animation: {
			open: 'animated bounceInUp',
			close: 'animated bounceOutDown',
		}
	});
	</script>
	@endif


	<script type="text/javascript">
		$(document).ready(function() {
			$('#dateofbirth').pickmeup({
	    		format  : 'd.m.Y',
			    locale      : {
			      days    : ['Nedjelja', 'Ponedjeljak', 'Utorak', 'Srijeda', 'Četvrtak', 'Petak', 'Subota', 'Nedjelja'],
			      daysShort : ['Ned', 'Pon', 'Uto', 'Sri', 'Čet', 'Pet', 'Sub', 'Ned'],
			      daysMin   : ['Ne', 'Po', 'Ut', 'Sr', 'Če', 'Pe', 'Su', 'Ne'],
			      months    : ['Siječanj', 'Veljača', 'Ožujak', 'Travanj', 'Svibanj', 'Lipanj', 'Srpanj', 'Kolovoz', 'Rujan', 'Listopad', 'Studeni', 'Prosinac'],
			      monthsShort : ['Sij', 'Velj', 'Ožu', 'Tra', 'Svi', 'Lip', 'Srp', 'Kol', 'Ruj', 'Lis', 'Stu', 'Pro']
			    }
			});
		});
	</script>


    {{-- Loop that implements additional footer JS for a module or specific view --}}
	@if (isset($js_footer_files) && is_array($js_footer_files))
		@foreach ($js_footer_files as $js_file)
		{{ HTML::script($js_file) }}
		@endforeach
	@endif


</body>

</html>
