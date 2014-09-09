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
    <link rel="stylesheet" href="<?php echo asset('fancybox/jquery.fancybox.css'); ?>">
    <link rel="stylesheet" href="<?php echo asset('js/vendor/redactor/redactor.css'); ?>">
    <link rel="stylesheet" href="<?php echo asset('css/toggles.css'); ?>">
    <link rel="stylesheet" href="<?php echo asset('css/toggles-soft.css'); ?>">
    
    <!-- Javascript Files
    ================================================== -->
<!--   	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>-->
    <script src="<?php echo asset('js/jquery.min.js');?>"></script>
<!--   	<script src="http://code.jquery.com/jquery-migrate-1.0.0.js"></script>-->
   	<script src="<?php echo asset('js/jquery-ui.js');?>"></script>
    <script src="<?php echo asset('js/bootstrap.min.js');?>"></script>
    <script src="<?php echo asset('fancybox/jquery.fancybox.js');?>"></script>
    <script src="<?php echo asset('js/jquery.simple-color.js');?>"></script>
    <script src="<?php echo asset('js/easing.js');?>"></script>
    <script src="<?php echo asset('js/jquery.ui.totop.js');?>"></script>
    <script src="<?php echo asset('js/jquery.isotope.min.js');?>"></script>
    <script src="<?php echo asset('js/selectnav.js');?>"></script>
    <script src="<?php echo asset('js/ender.js');?>"></script>
    <script src="<?php echo asset('js/custom.js');?>"></script>
    <script src="<?php echo asset('js/iframeResizer.min.js');?>"></script>  
    <script src="<?php echo asset('js/toggles.js');?>"></script>
    <script src="<?php echo asset('js/script.js');?>"></script>
    <script src="<?php echo asset('js/vendor/history.js');?>"></script>
    <script src="<?php echo asset('js/jquery.jeditable.js');?>"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/json2/20121008/json2.js"></script>
    <script src="<?php echo asset('js/jquery.ui.touch-punch.min.js');?>"></script>
    <script src="<?php echo asset('js/jquery.elevatezoom.js');?>"></script>     

    <!-- Require and backbone Files
    ================================================== -->    
    <script data-main="<?php echo asset('js/application/bootstrap'); ?>" src="<?php echo asset('js/require.js'); ?>"></script>
    <script src="<?php echo asset('js/vendor/redactor/fontsize.js');?>"></script>
    <script src="<?php echo asset('js/vendor/redactor/fontcolor.js');?>"></script>
    <script src="<?php echo asset('js/vendor/redactor/addmodal.js');?>"></script>
	
	</head>
	<body>
    	<div id="wrapper">
        	
	        <!-- header begin -->
	        <header>
	            <div class="info">
	                <div class="container">
	                    <div class="row">
	                        <div class="span6 info-text">
	                        @if ( Auth::check() )
	                            <i class="icon-user"></i> {{ Auth::user()->email }} &nbsp;|&nbsp; {{ link_to('logout', 'Logout' ) }}
	                        @else
	                        	{{ link_to('login', 'Login' ) }}
	                        @endif
	                        </div>
	                    </div>
	                </div>
	            </div>
					
	            <div class="container">
	            	<div class="row">      
						
		                <div class="span3" id="logo">
		                    <div class="inner">
		                         {{ link_to('/', 'Droit en sch&eacute;mas' ) }}
		                    </div>
		                </div>
						
						<div class="span7">
			                <!-- mainmenu begin -->
			                <ul id="mainmenu">
			                    <li>{{ link_to('', 'Accueil', array('class' => Request::is( 'schemas') ? 'active' : '')  ) }}</li>
			                    <li>{{ link_to('categorie', 'Catégories' , array('class' => Request::is( 'schemas/categorie') ? 'active' : '') ) }}</li>
			                    @if ( Auth::check() )
			                    	
									<li><a class="<?php echo (Request::is( 'compose/*') ? 'active' : ''); ?>" href="{{ url('compose/create') }}">Composer un schéma</a></li>
									<li> {{ link_to('user/'.Auth::user()->id, 'Votre profil' , array('class' => Request::is( 'user/*') ? 'active' : '')) }}</li>

                                @endif

			                    <li>{{ link_to('contact', 'Contact' , array('class' => Request::is( 'schemas/contact') ? 'active' : '') ) }}</li>
			                </ul>
			                <!-- mainmenu close -->
						</div>
						
						<div class="span2"><a id="logo_unine" class="logo_unine" href="http://www.unine.ch"><img src="{{ asset('images/logo_unine.png') }}" alt="" /></a></div>
						
	            	</div>
	            </div>
	            	        
	        <div id="colors_line"></div>
	        
	        </header>
	        <!-- header close -->
        
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
                            &copy; Copyright <?php echo date('Y'); ?> - Droit en schémas                     
                        </div>
                        <div class="span4">
                            Faculté de droit - Avenue du 1er-Mars 26 - 2000 Neuchâtel                    
                        </div>
                        <div class="span4">
                            <nav>
                                <ul>
                                    <li>{{ link_to('', 'Accueil' ) }}</li>
                                    <li>{{ link_to('categorie', 'Catégories' ) }}</li>
                                    <li>{{ link_to('contact', 'Contact' ) }}</li>
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