@extends('layouts.modal')

@section('content')
	
	<?php  $custom = new Custom; ?>
	
	@if ( !empty($projet) )		
			
        <!-- content begin -->
        <div id="content" style="padding:0;">
            <div class="container" style="width:100%">
                <div class="row">
                    <div class="span12" style="width:95%">

                        <div class="post-content no-space-left">
                            <p>
                                <a target="_parent" href="{{ url('compose/'.$projet['id'].'/edit#projet/'.$projet['id']) }}" class="btn btn-small btn-info">
                                    &Eacute;diter le schéma
                                </a>
                            </p>
                            <div class="post-text">
                                <h3>{{ $projet['titre'] }}</h3>
                                {{ $projet['description'] }}
                            </div>
                        </div>
                        <div class="post-meta no-space-left"><span><i class="icon-user"></i>
                        	Par: <a href="#">{{ $projet['user']['prenom'] }} {{ $projet['user']['nom'] }}</a></span> 
                        	<span><i class="icon-tag"></i>{{ $projet['theme']['titre'] }}</span>
                            <span><i class="icon-tag"></i>{{ $projet['subtheme']['titre'] }}</span>
                        </div>

						<div id="projet" style="height:{{ $height }}px;" class="projet_width">
  
						   	<div id="content-projet">
						   	
						   		@if(!empty($projet['boxe']))
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
							   		
							   		@endforeach					  
						   		@endif
						   		
							   	@if(!empty($projet['arrow']))
			                    	@foreach($projet['arrow'] as $arr)
		
										<p class="icon-large arrows icon-caret-{{ $arr['position'] }}" 
										   style="color: {{ $arr['couleurBg_arrow'] }}; 
												  position: absolute; 
												  top: {{ $arr['topCoord_arrow'] }}px; 
												  left: {{ $arr['leftCoord_arrow'] }}px;"> </p>
											                    		
			                    	@endforeach                  
			                    @endif
						   		
						   	</div> 	
                        </div>
                                               
                    </div>
                </div>
            </div>
        </div>
        <!-- content close -->
        
	@endif  
					
@stop