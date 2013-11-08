@extends('layouts.app')

@section('content')

    <!-- subheader begin -->
    <div id="subheader">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <h1>Accueil</h1>
                    <span>Schémas des procédures civiles</span>
                    <ul class="crumb">
                        <li>{{ link_to('schemas/', 'Accueil' ) }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- subheader close -->
	
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
							 $date   = $Carbon->createFromFormat('Y-m-d H:i:s', $projet->created_at);
							 
							 $day    = $date->format('d');  
							 $month  = $date->format('M'); 
						?>  
						
				        <li>
				            <div class="date-box">
				                <span class="day">{{ $day }}</span>
				                <span class="month">{{ $month }}</span>
				            </div>
				            <div class="txt">
				                <h5>{{ link_to('schemas/projet/'.$projet->id , $projet->titre ) }}</h5>
				                <span class="read">{{ $projet->description }}</span>
				                <span class="info">
				                	<strong>{{ $projet->theme->titre }}</strong> | {{ $projet->auteur }} | {{ link_to('schemas/projet/'.$projet->id , 'Voir le schéma' ) }} 
				                </span>
				            </div>
				        </li>
			        
			  		@endforeach
				@endif  
				</ul>
            	
            </div>
            <div class="span4 login-frontpage">
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
            </div>

        </div>
    </div>
	
@stop