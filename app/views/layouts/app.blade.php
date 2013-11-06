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
    
    <!-- Javascript Files
    ================================================== -->
   	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="<?php echo asset('js/bootstrap.min.js');?>"></script>
    <script src="<?php echo asset('js/jquery.prettyPhoto.js');?>"></script>
    <script src="<?php echo asset('js/easing.js');?>"></script>
    <script src="<?php echo asset('js/jquery.ui.totop.js');?>"></script>
    <script src="<?php echo asset('js/selectnav.js');?>"></script>
    <script src="<?php echo asset('js/ender.js');?>"></script>
    <script src="<?php echo asset('js/jquery.lazyload.js');?>"></script>
    <script src="<?php echo asset('js/custom.js');?>"></script>
    <script src="<?php echo asset('js/vendor/history.js');?>"></script>
	
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
	                        <a href="index.html"></a>
	                    </div>
	                </div>
	
	                <!-- mainmenu begin -->
	                <ul id="mainmenu">
	                    <li><a href="index.html">Accueil</a></li>
	                    <li><a href="#">Schémas</a>
	                        <ul>
	                            <li><a href="carousel.html">Procédure civile</a></li>
	                            <li><a href="carousel.html">Assurances sociales</a></li>
	                        </ul>
	                    </li>
	                    <li><a href="contact.html">Contact</a></li>
	                </ul>
	                <!-- mainmenu close -->
	
	            </div>
	        </header>
	        <!-- header close -->
	        
		    <!-- subheader begin -->
		    <div id="subheader">
		        <div class="container">
		            <div class="row">
		                <div class="span12">
		                    <h1>Accueil</h1>
		                    <span>Schémas des procédures civiles</span>
		                    <ul class="crumb">
		                        <li><a href="index.html">Accueil</a></li>
		                    </ul>
		                </div>
		            </div>
		        </div>
		    </div>
		    <!-- subheader close -->

			<!-- content begin -->
	        <div id="content">
	            <div class="container">
	                <div class="row">
	                    <div class="span12">
	                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt 
	                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex 
	                        ea commodo consequat. Duis aute irure dolor in reprehenderit  mollit anim id est laborum.                	  </p>
	                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
	                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt accusantium 
	                        doloremque laudantium, totam um fugiat quo voluptas nulla pariatur. </p>                   
	                    </div>
	                </div>
	            </div>
	        </div>
	        <!-- content close -->
        
	        <!-- content -->
	        <div class="container">
                <div class="row">
                    <div class="span8">
                    
                    	@yield('content')
                    	
                    </div>
                    <div class="span4 login-frontpage">
                        <h3>Login</h3>
                        
                        <ul class="errors">
							 @foreach($errors->all() as $message)
							 <li>{{ $message }}</li>
							 @endforeach
						 </ul>
						 
						  <div class="contact_form_holder">	
						  					  
								{{ Form::open(array('url' => 'newProject', 'class' => 'form-login')) }}

								{{ Form::label('email', 'Email', array( 'class' => '' ) ) }}							
								{{ Form::text('email', '' , array('class' => '')) }}

								{{ Form::label('password', 'Mot de passe', array( 'class' => '' )) }}
								{{ Form::password('password', '' , array('class' => '')) }}
								
								{{ Form::submit('Envoyer', array('class' => 'btn btn-inverse')) }}
								<p class="clear"></p>
								{{ Form::close() }}
								
						  </div>
                    </div>

                </div>
	        </div>
            <!--  content close -->
            
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
	                                    <li><a href="#">Home</a></li>
	                                    <li><a href="#">Schémas</a></li>
	                                    <li><a href="#">Contact</a></li>
	                                </ul>
	                            </nav>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </footer>
	        <!-- footer close -->
            
		</div>
	</body>
</html>