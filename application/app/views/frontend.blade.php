<?php
/*
 *	Frontend template file
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

    <?php
		if (isset($description))
		{
			$final_description = $description;
		}
		else
		{
			$final_description = Lang::get('core.app_description');
		}
	?>

    <meta name="description" content="{{ $final_description }}">

    <?php
		if (isset($keywords))
		{
			$final_keywords = $keywords;
		}
		else
		{
			$final_keywords = Lang::get('core.app_keywords');
		}
	?>

    <meta name="keywords" content="{{ $final_keywords }}">

 	<meta name="author" content="Culex d.o.o., info@culex.hr">

	<link rel="icon" href="{{ URL::asset('favicon.png') }}">

	<link rel="apple-touch-icon-precomposed" href="{{ URL::asset('favicon.png') }}">

	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ URL::asset('favicon.png') }}">

	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ URL::asset('favicon.png') }}">

	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ URL::asset('favicon.png') }}">


      <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Stipino - Samo domaće, iz Baranje" />
    <meta name="keywords" content="stipino, domaće, baranja, voće, jabuka, džem" />
    <meta name="author" content="Stipe Dumančić" />

    <!-- Favicon and Touch Icons -->
    <link href="images/favicon.png" rel="shortcut icon" type="image/png">
    <link href="images/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
    <link href="images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
    <link href="images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">
    <!-- Stylesheet -->
    {{ HTML::style('css/frontend/bootstrap.min.css') }}
    {{ HTML::style('css/frontend/jquery-ui.min.css') }}
    {{ HTML::style('css/frontend/animate.css') }}
    {{ HTML::style('css/frontend/css-plugin-collections.css') }}
    <!-- CSS | menuzord megamenu skins -->
    {{ HTML::style('css/frontend/menuzord-skins/menuzord-rounded-boxed.css') }}
    <!-- CSS | Main style file -->
    {{ HTML::style('css/frontend/style-main.css') }}
    {{ HTML::style('css/frontend/mobile.css') }}
    <!-- CSS | Custom Margin Padding Collection -->
	{{ HTML::style('css/frontend/custom-bootstrap-margin-padding.css') }}
	<!-- CSS | Responsive media queries -->
	{{ HTML::style('css/frontend/responsive.css') }}
	{{ HTML::style('css/frontend/custom.css') }}
   
   


    <!-- external javascripts -->
    {{ HTML::script('js/frontend/jquery-2.2.0.min.js') }}
    {{ HTML::script('js/frontend/jquery-ui.min.js') }}
    {{ HTML::script('js/frontend/bootstrap.min.js') }}
    <!-- JS | jquery plugin collection for this theme -->
    {{ HTML::script('js/frontend/jquery-plugin-collection.js') }}
    <!-- Revolution Slider 5.x SCRIPTS -->

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
	
<!--fontawesome-->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Fonts -->

    <link href='http://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>
   
	{{-- Loop that implements additional CSS for a module and/or view --}}
	@if (isset($css_files) && is_array($css_files))
		@foreach  ($css_files as $css_file)
	{{ HTML::style($css_file) }}
		@endforeach
	@endif
	{{ HTML::style('css/frontend/custom.css') }}

    

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

    <?php
		if (isset($bodyclass))
		{
			$final_bodyclass = $bodyclass;
		}
		else
		{
			$final_bodyclass = 'bg-grain';
		}
	?>
 

<body class="{{ $final_bodyclass }}">

		{{ $content or null }}
             </div>
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

 	{{ HTML::script('js/frontend/custom.js') }}
	{{ HTML::script('js/backend/jquery.noty.packaged.min.js') }}
	{{ HTML::script('js/backend/noty.app.theme.js') }}
	
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


    {{-- Loop that implements additional footer JS for a module or specific view --}}
	@if (isset($js_footer_files) && is_array($js_footer_files))
		@foreach ($js_footer_files as $js_file)
		{{ HTML::script($js_file) }}
		@endforeach
	@endif


</body>

</html> 