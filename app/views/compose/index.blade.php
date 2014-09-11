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
                            @if( (($isEditable == 'admin') || ($isEditable == 'editor')) && ($projet['type'] == 'app') )
                            <p>{{ link_to('compose/'.$projet['id'].'/edit#projet/'.$projet['id'],'&Eacute;diter le schéma',array('class' => 'btn btn-small btn-info isEditable')) }}</p>
                            @endif
                            <div class="post-text">
                               	<h3>{{ $projet['titre'] }}</h3>
                                <p>{{ $projet['description'] }}</p>
                            </div>
                        </div>
                        <div class="post-meta no-space-left">
                            <span><i class="icon-tag"></i>{{ link_to('theme/'.$projet['theme']['id'], $projet['theme']['titre'] ) }}</span>
                            <span><i class="icon-tag"></i>{{ link_to('theme/'.$projet['subtheme']['id'], $projet['subtheme']['titre'] ) }}</span>
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