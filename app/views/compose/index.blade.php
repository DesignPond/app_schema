@extends('layouts.master')

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

                                @if($isEditable && ($projet['type'] != 'app')) 
	                                <h3 class="text-isEditable">
	                                	<span data-column="titre" data-id="{{ $projet['id'] }}" class="edit_content">{{ $projet['titre'] }}</span>
	                                	<i class="icon-edit icon-isEditable"></i>
	                                </h3>
	                                @if( !empty($projet['description']) )
	                                <p class="text-isEditable">
	                                	<span data-column="description" data-id="{{ $projet['id'] }}" class="edit_content">{{ $projet['description'] }}</span>
		                                <i class="icon-edit icon-isEditable"></i>
	                                </p>
	                                @endif
                                @else
                               		<h3>{{ $projet['titre'] }}</h3> {{ $projet['description'] }}
                                @endif
                                
                                @if($isEditable && ($projet['type'] == 'app'))
                                {{ link_to('compose/'.$projet['id'].'/edit#projet/'.$projet['id'],'&Eacute;diter le schéma',array('class' => 'btn btn-small btn-primary isEditable')) }}
                                @endif
 
                            </div>
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
										<p class="icon-large arrows icon-caret-{{ $arr['position'] }}"  style="color: {{ $arr['couleurBg_arrow'] }};
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