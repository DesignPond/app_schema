<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<head>
    <meta charset="utf-8" />
	<title>Droit en schéma</title>
	<meta name="description" content="Droit en schéma">
	<meta name="author" content="Cindy Leschaud">
	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet" href="<?php echo asset('css/bootstrap.css'); ?>">
	
	<link rel="stylesheet" href="<?php echo asset('css/style.css');?>">
	<link rel="stylesheet" href="<?php echo asset('css/bubbles.css');?>">
	<link rel="stylesheet" href="<?php echo asset('css/jquery-ui-1.8.21.custom.css');?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo asset('css/jquery.contextMenu.css');?>">
    <link rel="stylesheet" href="<?php echo asset('css/redactor/redactor.css');?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo asset('css/font-awesome.css');?>" type="text/css"/>
    <script src="<?php echo asset('js/vendor/history.js');?>"></script>
    <script src="<?php echo asset('js/vendor/redactor/fontsize.js');?>"></script>
    <script src="<?php echo asset('js/vendor/redactor/fontcolor.js');?>"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/json2/20121008/json2.js"></script>
    <script data-main="<?php echo asset('js/application/bootstrap');?>" src="<?php echo asset('js/require.js');?>"></script>
	
	</head>
	<body>
        <div class="container">
        
        <header id="mainHeader" class="row">
			<div class="navbar navbar-inverse">
			  <a class="navbar-brand" href="#">Droit en schéma</a>
			  <ul class="nav navbar-nav">

			    <li <?php //if ($title == 'index' || $title == '') {echo ' class="active"';} ?> >
			    	<a href="<?php //echo action('AppController@getIndex');?>">Projets</a>
			    </li>
			    <li <?php //if ($title == 'create' || $title == 'addProjet') {echo ' class="active"';} ?>>
			    	<a href="<?php //echo action('AppController@showCreate'); ?>">Créer</a>
			    </li>
			    
			  </ul>
			</div>
	    </header>
        	
            @yield('content')
            
        </div>
        
    	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    	<script src="<?php echo asset('js/script.js');?>"></script>
	</body>
</html>