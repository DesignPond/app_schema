@extends('layouts.app')

@section('content')
	
	@if ( !empty($projet) )		
			
        <!-- content begin -->
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="span12">

                        <div class="post-content no-space-left">
                            <div class="post-text">
                                <h3><a href="css/#">{{ $projet['titre'] }}</a></h3>
                                {{ $projet['description'] }}
                            </div>
                        </div>
                        <div class="post-meta no-space-left"><span><i class="icon-user"></i>
                        	Par: <a href="#">{{ $projet['user']['prenom'] }} {{ $projet['user']['nom'] }}</a></span> 
                        	<span><i class="icon-bookmark"></i><a href="#">{{ $projet['theme']['titre'] }}</a></span>
                        	<!-- <span><i class="icon-comment"></i><a href="#">10 Commentaires</a></span> --> 
                        </div>
                        
                        <div id="controls" class="row">
	                         <div id="colors" class="span3">
	                         	<p>Couleur</p><input id="colorPicker" class="simple_color" value="{{ $projet['theme']['couleur'] }}"/>
	                         </div>
	                         <div id="shapes" class="span6">
				                <button class="btn"  id="add"><span class="car"></span>Ajouter</button>
								<button data-position="down"  class="btn arrow"><span class="down"></span>Bas</button>
						        <button data-position="left"  class="btn arrow"><span class="left"></span>Gauche</button>
						        <button data-position="right" class="btn arrow"><span class="right"></span>Droite</button>
						        <button data-position="up"    class="btn arrow"><span class="up"></span>Haut</button>
				            </div>
				            <div class="span3">
				            	<button type="button" class="btn btn-primary save">Terminer</button>
				             </div>
                        </div>
                        
                        <div id="projet">
            
                        @if(!empty($projet['boxe']))
                        
						   	<div id="content-projet">
						   		
						   		@foreach($projet['boxe'] as $box)
						   		
						   		<div class="box" 
						   			 style="background-color:{{ $box['couleurBg_node'] }}; 
								   			border:2px solid {{ $box['borderBg_node'] }}; 
								   			position:absolute; 
								   			width:{{ $box['width_node'] }}px; 
								   			height:{{ $box['height_node'] }}px; 
								   			z-index:{{ $box['zindex'] }}; 
								   			top:{{ $box['topCoord_node'] }}px; 
								   			left: {{ $box['leftCoord_node'] }}px;">
							   		<div class="inner">
										{{ $box['text'] }}
									</div>
						   		</div>
						   		
						   		<?php  $contentHeight[] = $box['topCoord_node'] + $box['height_node']; ?>
						   		
						   		@endforeach
						   		
						   	</div>
						   	{{ print_r($contentHeight) }}	
						   	
	                    @else
	                         <p id="emptyProjet">Le projet est vide</p>	 
	                    @endif
	                        
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- content close -->
        
	@endif  
					
@stop