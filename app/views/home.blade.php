@extends('layouts.master')

@section('content')
	
	<div id="content">
        <div class="container marge-top">
            <div class="row">
                <div class="span12">
                    <p>Complément indispensable de l'ouvrage <strong>"La procédure civile en schémas"</strong>, ce site reprend l’ensemble des schémas du livre ainsi que d'autre schémas additionels.
						Les graphiques couvrent les matières traitées par le Code, en décrivant les processus formels et en tentant de conceptualiser les notions essentielles.</p>  

						<p>Un soin particulier a été mis dans la réalisation des schémas, déclinés en douze couleurs et dégradés afin d’en faciliter la lecture et la compréhension.</p>               
                </div>
            </div>
        </div>
    </div>

	<div class="container">
        <div class="row">
            <div class="span8">

            	<h3>Derniers Projets</h3>
			    <ul class="bloglist-small">
				@if ( !empty($projets) )
					@foreach($projets as $projet) 
					
						<?php
						
							 $Carbon = new Carbon\Carbon();
							 
							 $date   = $Carbon->createFromFormat('Y-m-d H:i:s', $projet['created_at']);
							 
							 $day    = $date->format('d');  
							 $month  = $date->format('M'); 
						?>  
						
				        <li>
				            <div class="date-box">
				                <span class="day">{{ $day }}</span>
				                <span class="month">{{ $month }}</span>
				            </div>
				            <div class="txt">
				               		<h5>{{ link_to('schemas/projet/schema/'.$projet['id'], $projet['titre']) }}</h5>
				                <span class="info">
				                	<strong>{{ $projet['theme']['titre'] }}</strong> | 
				                		{{ $projet['user']['prenom'] }} {{ $projet['user']['nom'] }} | 
					               		{{ link_to('schemas/projet/schema/'.$projet['id'], 'Voir le schéma') }}
				                </span>
				            </div>
				        </li>
			        
			  		@endforeach
				@endif  
				</ul>
            	
            </div>
            <div class="span4 login-frontpage">
            
            	  @if (Auth::check())
    	  
            	  	<h3>Vos infos</h3>
				  	<div class="widget tab-holder">
                            <div class="de_tab">
                                <ul class="de_nav">
                                    <li><span class="active">Vos schémas</span></li>
                                    <li><span>Profil</span></li>
                                </ul>

                                <div class="de_tab_content">

                                    <div class="tab-small-post tab-hompage">
                                        <ul>
                                        
                                        @if ( !empty($user_projets) )
											@foreach($user_projets as $user_projet) 
											
											<?php  $projetdate = $Carbon->createFromFormat('Y-m-d H:i:s', $user_projet['created_at'] ); ?>

                                            <li>
                                                <span class="post-content">
                                                    {{ link_to('schemas/projet/schema/'.$user_projet['id'], $user_projet['titre'] ) }}
                                                </span>
                                                <span class="post-date">{{ $projetdate->format('d/m/Y'); }}</span>
                                            </li>
                                            
											@endforeach
										@endif 
										
                                        </ul>
                                        <p>{{ link_to('schemas/user/'. Auth::user()->id , 'Tous vos projets', array( 'class' => 'btn btn-mini btn-primary') ) }}</p>
                                    </div>

                                    <div class="tab-small-post">
                                        <address>
			                                {{ Auth::user()->prenom }} {{ Auth::user()->nom }}
			                                <span><strong>Email:</strong><a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a></span>
			                            </address>
                                    </div>
                                    
                                </div>

                            </div>
                        </div>

	              @else
	              
	             	 <h3>Login</h3>
	                
	                  <ul class="errors">
						 @foreach($errors->all() as $message)
						 <li>{{ $message }}</li>
						 @endforeach
					  </ul>
					 
					  <div class="contact_form_holder">	
					  					  
							{{ Form::open(array( 'url' => 'login', 'class' => 'form-login')) }}
	
							{{ Form::label('email', 'Email', array( 'class' => '' ) ) }}							
							{{ Form::text('email', '' , array('class' => '')) }}
	
							{{ Form::label('password', 'Mot de passe', array( 'class' => '' )) }}
							{{ Form::password('password', '' , array('class' => '')) }}
							
							{{ Form::submit('Envoyer', array('class' => 'btn')) }}
							<p class="clear"></p>
							{{ Form::close() }}
							
							<div class="clearfix"></div>
					  </div>

				  @endif
				  
            </div>

        </div>
    </div>
	
@stop