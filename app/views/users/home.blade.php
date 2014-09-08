@extends('layouts.master')

@section('content')

<!-- Subheader -->
@include('partials.subheader')

<?php  $custom = new Custom; ?>

	<div class="content">
    	<div class="container profile">
			 <div class="row">
		        <div class="span1 widget">
		        	<ul class="">
			        	<li>Nom</li>
			        	<li>Email</li>
		        	</ul>
                </div>
		        <div class="span11 widget">
		        	<ul>
			        	<li>{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</li>
			        	<li><a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a></li>
		        	</ul>
                </div>
            </div>
        </div>
    </div>
	
 	@if(!empty($sorting))
 		@foreach($sorting as $sorted) 
			
			<div id="content">
		        <div class="container">
		        	<h3>{{ key($sorting) }}</h3>
		        	
			 			<div class="well">
			 			@if(!empty($sorted))
			 				@foreach($sorted as $categorie => $projets) 
			 					
			 				<h4>{{ $categorie }}</h4>
			 				<div class="row">
			 					<div class="gallery user-gallery">
			 							 					
			 					@if(!empty($sorted))
			 						@foreach($projets as $projet) 
			 							
			 							<!-- gallery item -->
					                    <div class="span4 item">
					                    	<a href="{{ url('compose/'.$projet['id'].'/delete') }}" data-action="Projet" class="deleteSchema deleteAction"></a>
					                    	<div class="status {{ $projet['status'] }}"></div>
					                        <div class="picframe">
												<span class="itemColor " style="background:{{ $projet['theme']['couleur_primaire'] }};">
												<a href="{{ url('compose', array('id' => $projet['id'] ) ) }}">
													@if($projet['type'] == 'app')										
														<img src="{{ asset('images/pf2.png') }}" data-original="{{ asset('images/pf2.png') }}" alt="" />									
													@else	
														<img src="{{ asset('images/pf3.png') }}" data-original="{{ asset('images/pf3.png') }}" alt="" />	                                   
					                                @endif 
												</a>    
					                            </span>
					                            <span class="itemInfos">
					                           		<h4>{{ link_to('compose/'.$projet['id'], $projet['titre']) }}</h4>
											   		<div class="auteur">{{ $custom->limit_words($projet['description'], 10) }}</div>
					                            </span>
					                        </div>
					                    </div>
					                    <!-- close gallery item -->
			 							
			 						@endforeach
			 					@endif 	
			 					
			 					</div>
			 				</div>
			 					
			 				@endforeach
			 			@endif 			 		                
			 			</div> 
			        </div>
			    </div>
		    			 		
				@endforeach
			@endif 	
	
@stop