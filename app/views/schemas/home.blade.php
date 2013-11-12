@extends('layouts.app')

@section('content')
	
	<div id="content">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt 
                    ut labore et <strong>dolore magna aliqua</strong>. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex 
                    ea commodo consequat. Duis aute irure <strong>dolor in reprehenderit  mollit</strong> anim id est laborum.</p>               
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
				                <h5>{{ link_to('schemas/projet/'.$projet['id'].'#projet/'.$projet['id'] , $projet['titre'] ) }}</h5>
				                <span class="read">{{ $projet['description'] }}</span>
				                <span class="info">
				                	<strong>{{ $projet['theme']['titre'] }}</strong> | 
				                	{{ $projet['user']['prenom'] }} {{ $projet['user']['nom'] }} | {{ link_to('schemas/projet/'.$projet['id'].'#projet/'.$projet['id'] , 'Voir le schéma' ) }} 
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
                                    <li><span>Profile</span></li>
                                </ul>

                                <div class="de_tab_content">

                                    <div class="tab-small-post tab-hompage">
                                        <ul>
                                            <li>
                                                <span class="post-content">
                                                    <a href="#">Sed ut perspiciatis unde </a></span>
                                                <span class="post-date">Sept 22, 2013</span>
						                        <span><i class="icon-bookmark"></i><a href="#">Histoire</a></span>
                                            </li>

                                            <li>
                                                <span class="post-content">
                                                    <a href="#">Sed ut perspiciatis unde </a></span>
                                                <span class="post-date">Sept 22, 2013 </span>
                                                <span><i class="icon-bookmark"></i><a href="#">Histoire</a></span>
                                            </li>

                                        </ul>
                                    </div>

                                    <div class="tab-small-post">
                                        <address>
			                                100 Mainstreet Center, Sydney
			                                <span><strong>Phone:</strong>(208) 333 9296</span>
			                                <span><strong>Fax:</strong>(208) 333 9298</span>
			                                <span><strong>Email:</strong><a href="mailto:contact@example.com">contact@example.com</a></span>
			                                <span><strong>Web:</strong><a href="#test">http://example.com</a></span>
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
							
					  </div>

				  @endif
				  
            </div>

        </div>
    </div>
	
@stop