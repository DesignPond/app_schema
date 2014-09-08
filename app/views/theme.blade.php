@extends('layouts.app')

@section('content')

<!-- Subheader -->
@include('partials.subheader')

<?php  $custom = new Custom; ?>
	
<div id="content">
    <div class="container">
        <div class="row"> 
	
				<!-- content begin -->
		        <div id="content">
		            <div class="container">

		                <div class="row">
		                    <div id="gallery" class="gallery">

		                    @if ( !empty($projets) )
								@foreach($projets as $projet) 
			                    
		                        <!-- gallery item -->
		                        <div class="span3 item {{ $custom->makeSlug( $custom->if_exist($subthemes[$projet['subtheme_id']])) }}">
		                            <div class="picframe">
		                                <span class="overlay">
		                                    <span class="info-area">	                                    	
		                                       <a class="img-icon-zoom" href="{{ url('schemas/projet/schema/'.$projet['id']) }}" title=""></a>		                                       
		                                    </span>
		                                </span>
										<span class="itemColor" style="background:{{ $couleur }};">
											@if($projet['type'] == 'app')										
												<img src="{{ asset('images/pf2.png') }}" data-original="{{ asset('images/pf2.png') }}" alt="" /></span>
												<h4>{{ link_to('schemas/projet/schema/'.$projet['id'], $projet['titre'] ) }}</h4>										
											@else										
												<img src="{{ asset('images/pf3.png') }}" data-original="{{ asset('images/pf3.png') }}" alt="" /></span>	
												<h4>{{ link_to('schemas/projet/schema/'.$projet['id'], $projet['titre']) }}</h4>                                      
		                                    @endif 
				                        <div class="auteur">{{ $projet['user']['prenom'] }} {{ $projet['user']['nom'] }}</div>
				                        <div class="description">{{ $custom->limit_words($projet['description'], 15) }}</div>
		                            </div>
		                        </div>
		                        <!-- close gallery item -->
		                        
								@endforeach
							@endif 
							
		                    </div>
		                </div>
		            </div>
		        </div>
		        <!-- content close -->
			 	
		</div>
	</div>
</div>
					
@stop