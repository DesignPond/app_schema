@extends('layouts.app')

@section('content')

<?php  $custom = new Custom; ?>
	
	<div id="content">
        <div class="container">
            
           			 	
			 	@if(!empty($sorting))
			 		@foreach($sorting as $sorted) 
			 					 			
			 			<h3>{{ key($sorting) }}</h3>
			 			
			 			@if(!empty($sorted))
			 				@foreach($sorted as $categorie => $projets) 
			 					
			 					<h4>{{ $categorie }}</h4>
			 					<div class="row">
			 					<div class="gallery">
			 							 					
			 					@if(!empty($sorted))
			 						@foreach($projets as $projet) 
			 							
			 							<!-- gallery item -->
					                    <div class="span3 item">
					                        <div class="picframe">
				                    		    <span class="overlay">
				                                    <span class="info-area">	                                    	
				                                       <a class="img-icon-zoom" href="{{ url('schemas/projet/schema/'.$projet['id']) }}" title=""></a>		                                       
				                                    </span>
				                                </span>
												<span class="itemColor " style="background:{{ $projet['theme']['couleur'] }};">
													@if($projet['type'] == 'app')										
														<img src="{{ asset('images/pf2.png') }}" data-original="{{ asset('images/pf2.png') }}" alt="" /></span>
														<h4>{{ link_to('schemas/projet/schema/'.$projet['id'], $projet['titre'] ) }}</h4>										
													@else										
														<img src="{{ asset('images/pf3.png') }}" data-original="{{ asset('images/pf3.png') }}" alt="" /></span>	
														<h4>{{ link_to('schemas/projet/schema/'.$projet['id'], $projet['titre']) }}</h4>                                      
					                                @endif 
						                        <div class="auteur">{{ $custom->if_exist($projet['subtheme']['titre']) }}</div>
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