@extends('layouts.app')

@section('content')

<?php  $custom = new Custom; ?>
	
	
    <!-- call to action -->
    <div class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="span6">
                    <h4>{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</h4>
			        <a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a>
                </div>
                <div class="span6">
                    <a href="#" class="btn btn-small btn-primary">Get This Now!</a>
                </div>
            </div>
        </div>
    </div>
    <!-- call to action close -->
	
	<div id="content">
        <div class="container">
	 	
			 	@if(!empty($sorting))
			 		@foreach($sorting as $sorted) 
			 					 			
			 			<h3>{{ key($sorting) }}</h3>
			 			
			 			@if(!empty($sorted))
			 				@foreach($sorted as $categorie => $projets) 
			 					
			 				<h4>{{ $categorie }}</h4>
			 				<div class="row">
			 					<div class="gallery user-gallery">
			 							 					
			 					@if(!empty($sorted))
			 						@foreach($projets as $projet) 
			 							
			 							<!-- gallery item -->
					                    <div class="span4 item">
					                        <div class="picframe">
												<span class="itemColor " style="background:{{ $projet['theme']['couleur'] }};">
												<a href="{{ url('schemas/projet/schema', array('id' => $projet['id'] ) ) }}">
													@if($projet['type'] == 'app')										
														<img src="{{ asset('images/pf2.png') }}" data-original="{{ asset('images/pf2.png') }}" alt="" />									
													@else	
														<img src="{{ asset('images/pf3.png') }}" data-original="{{ asset('images/pf3.png') }}" alt="" />	                                   
					                                @endif 
												</a>    
					                            </span>
					                            <span class="itemInfos">
					                           		<h4>{{ link_to('schemas/projet/schema/'.$projet['id'], $projet['titre']) }}</h4>    
											   		<div class="auteur">{{ $custom->if_exist($projet['subtheme']['titre']) }}</div>
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
			 		
					@endforeach
				@endif 			 		                
                
        </div>
    </div>
	
@stop