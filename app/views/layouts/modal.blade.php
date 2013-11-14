<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<head>
    <meta charset="utf-8" />
	<title>Droit en schéma</title>
	<meta name="description" content="Droit en schéma">
	<meta name="author" content="Cindy Leschaud">
	<meta name="viewport" content="width=device-width">
    
    <!-- CSS Files
    ================================================== -->
    <link rel="stylesheet" href="<?php echo asset('css/main.css');?>" type="text/css" id="main-css">
    <link rel="stylesheet" href="<?php echo asset('css/smoothness/jquery-ui-1.10.3.custom.css'); ?>" type="text/css" media="screen" />
    
    <!-- Javascript Files
    ================================================== -->
   	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
   	<script src="http://code.jquery.com/jquery-migrate-1.0.0.js"></script>
   	<script src="<?php echo asset('js/jquery-ui.js');?>"></script>
    <script src="<?php echo asset('js/bootstrap.min.js');?>"></script>
	
	</head>
	<body>
    	<div id="wrapper">
        
	        <!-- content -->
	        
	        @yield('content')
	        
	        <!--  content close -->
            
		</div>
		<!--  wrapper close -->
	</body>
</html>