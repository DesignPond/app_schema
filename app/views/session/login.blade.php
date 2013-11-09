@extends('layouts.master')

@section('content')

    <!-- content begin -->
	<div id="content">
        <div class="container">
            <div class="row">
	        	
	        	 <div class="span4">&nbsp;</div>
	             <div class="span4 login-frontpage">
	                <h3>Login</h3>
	                
					  	@if (Session::has('flash_error'))
					        <div class="alert alert-error">
                            	<strong>Error.</strong><br/> {{ Session::get('flash_error') }}
							</div>
					    @endif
					 
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
	            <div class="span4">&nbsp;</div>        
	
	        </div>
	    </div>
    </div>
    
@stop