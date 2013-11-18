@extends('layouts.app')

@section('content')

	<?php  $custom = new Custom; ?>
		
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
                        	<span><i class="icon-tag"></i>{{ link_to('schemas/theme/'.$projet['theme']['id'], $projet['theme']['titre'] ) }}</span>
                        	<span><i class="icon-tags"></i> {{   $custom->if_exist($projet['subtheme']['titre']) }}</span> 
                        </div>
                        
                        @if($projet['type'] == 'app')
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
                        
                        @else
                        
                        <div id="projet" class="projet_width">
                        	 <embed src="{{ asset('documents/projets/litispendance.pdf') }}" width="1024"  height="750"></embed>
                        </div>
                        
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- content close -->
        
	@endif  
					
@stop