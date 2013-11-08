@extends('layouts.app')

@section('content')

<?php  $custom = new Custom; ?>
	
<!-- subheader begin -->
<div id="subheader">
    <div class="container">
        <div class="row">
            <div class="span12">
                <h1>Thème</h1>
                <span>{{ $projets[0]['titre'] }}</span>
                <ul class="crumb">
                    <li>{{ link_to('schemas/', 'Accueil' ) }}</li>
                    <li class="sep">/</li>
                    <li>Catégorie</li>
                    <li>Thème</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- subheader close -->
	
<div id="content">
    <div class="container">
        <div class="row"> 
	
				<!-- content begin -->
		        <div id="content">
		            <div class="container">
		                <div class="row">
		                    <div class="span12">	                  
		                        <ul id="filters">
		                        	<li><a href="#" data-filter="*" class="selected">Tous</a></li>
		                        	
		                        	@if ( !empty($subthemes) )
										@foreach($subthemes as $subtheme) 
										
											<li><a href="#" data-filter=".{{ $custom->makeSlug($subtheme) }}">{{ $subtheme }}</a></li>	
		
										@endforeach
									@endif 
									
		                        </ul>
		                    </div>
		                </div>

		                <div class="row">
		                    <div id="gallery" class="gallery">

		                    @if ( !empty($projets[0]['projet']) )
								@foreach($projets[0]['projet'] as $projet) 
			                    
		                        <!-- gallery item -->
		                        <div class="span3 item {{ $custom->makeSlug( $custom->if_exist($subthemes[$projet['refSubtheme']])) }}">
		                            <div class="picframe">
		                                <span class="overlay">
		                                    <span class="info-area">
		                                        <a class="img-icon-zoom" href="{{ url('schemas/projet/'.$projet['id']) }}" data-type="prettyPhoto[gallery]" title=""></a>
		                                    </span>
		                                </span>
										<span class="itemColor" style="background:{{ $projets[0]['couleur'] }};">
											<img src="{{ asset('images/pf2.png') }}" data-original="{{ asset('images/pf2.png') }}" alt="" /></span>
										<h4>{{ link_to('schemas/projet/'.$projet['id'], $projet['titre']) }}</h4>
				                        <div class="auteur">{{ $projet['auteur'] }}</div>
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