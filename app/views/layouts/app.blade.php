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
    <link rel="stylesheet" href="<?php echo asset('css/jquery.contextMenu.css'); ?>">
    <link rel="stylesheet" href="<?php echo asset('js/vendor/redactor/redactor.css'); ?>">
    
    <!-- Javascript Files
    ================================================== -->
   	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
   	<script src="<?php echo asset('js/jquery-ui.js');?>"></script>
    <script src="<?php echo asset('js/bootstrap.min.js');?>"></script>
    <script src="<?php echo asset('js/jquery.prettyPhoto.js');?>"></script>
    <script src="<?php echo asset('js/jquery.simple-color.js');?>"></script>
    <script src="<?php echo asset('js/easing.js');?>"></script>
    <script src="<?php echo asset('js/jquery.ui.totop.js');?>"></script>
    <script src="<?php echo asset('js/jquery.isotope.min.js');?>"></script>
    <script src="<?php echo asset('js/selectnav.js');?>"></script>
    <script src="<?php echo asset('js/ender.js');?>"></script>
    <script src="<?php echo asset('js/jquery.lazyload.js');?>"></script>
    <script src="<?php echo asset('js/custom.js');?>"></script>
    <script src="<?php echo asset('js/vendor/history.js');?>"></script>
    <script src="<?php echo asset('js/vendor/redactor/fontsize.js');?>"></script>
    <script src="<?php echo asset('js/vendor/redactor/fontcolor.js');?>"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/json2/20121008/json2.js"></script>

    <!-- Require and backbone Files
    ================================================== -->    
    <script data-main="<?php echo asset('js/application/bootstrap'); ?>" src="<?php echo asset('js/require.js'); ?>"></script>
	
	</head>
	<body>
    	<div id="wrapper">
        	
	        <!-- header begin -->
	        <header>
	            <div class="info">
	                <div class="container">
	                    <div class="row">
	                        <div class="span6 info-text">
	                            <strong>Email:</strong>  <a href="#">info@droitenschema.ch</a>
	                        </div>
	                        <div class="span6 text-right">
	                            <div class="social-icons">
	                                <a class="social-icon sb-icon-facebook" href="#"></a>
	                                <a class="social-icon sb-icon-rss" href="#"></a>
	                                <a class="social-icon sb-icon-linkedin" href="#"></a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="container">
	                <div id="logo">
	                    <div class="inner">
	                        {{ link_to('schemas/', '' ) }}
	                    </div>
	                </div>
	
	                <!-- mainmenu begin -->
	                <ul id="mainmenu">
	                    <li>{{ link_to('schemas/', 'Accueil' ) }}</li>
	                    <li>{{ link_to('schemas/categorie/', 'Catégories' ) }}</li>
	                    <li>{{ link_to('schemas/contact', 'Contact' ) }}</li>
	                </ul>
	                <!-- mainmenu close -->
	
	            </div>
	        </header>
	        <!-- header close -->
	        
	        	        
	       <?php  if( Request::segment(2) != 'projet'){  ?>  	        
		    
		    @section('sidebar')
			 	
			    <!-- subheader begin -->
			    <div id="subheader">
			        <div class="container">
			            <div class="row">
			                <div class="span12">
			                    <h1>{{ $titre }}</h1>
			                    <span>{{ $soustitre }}</span>
			                    <ul class="crumb">
			                    
			                    	@if ( Auth::check() )
									    <li><i class="icon-user"></i> {{ Auth::user()->email }}</li>
									    <li> | <a href="">Logout</a></li>
									@endif 
			                       
			                    </ul>
			                </div>
			            </div>
			        </div>
			    </div>
			    <!-- subheader close -->
   
			@show
			
			<?php } ?>
        
	        <!-- content -->
	        
	        @yield('content')
	        
	        <!--  content close -->
            
		</div>
		<!--  wrapper close -->
            
        <!-- footer begin -->
        <footer>
            <div class="subfooter">
                <div class="container">
                    <div class="row">
                        <div class="span4">
                            &copy; Copyright 2013 - Droit en Schéma                     
                        </div>
                        <div class="span4">
                            Faculté de droit - Avenue du 1er-Mars 26 - 2000 Neuchâtel                    
                        </div>
                        <div class="span4">
                            <nav>
                                <ul>
                                    <li>{{ link_to('schemas/', 'Accueil' ) }}</li>
                                    <li>{{ link_to('schemas/categorie/', 'Catégories' ) }}</li>
                                    <li>{{ link_to('schemas/contact', 'Contact' ) }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer close -->
	</body>
</html>