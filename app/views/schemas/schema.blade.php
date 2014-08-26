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
                                {{ link_to('schemas/projet/'.$projet['id'].'/#projet/'.$projet['id'],'&Eacute;diter le schéma',array('class' => 'btn btn-small btn-primary isEditable')) }}
                                @endif
 
                            </div>
                        </div>
                        <div class="post-meta no-space-left">

                        	@if($isEditable && ($projet['type'] != 'app') )
                        		
                        		<div class="row">
                        			<div class="span6">
	                        			{{ Form::select('theme_id',$themes,$projet['theme']['id'],array('id' => 'theme-edit','data-id' => $projet['id'],'data-column' => 'theme_id' )) }} 
                        			</div>
                        			<div class="span3">
                        				<?php if(Session::has('error_file')){ ?>
                        				<?php echo Session::get('error_file'); ?>
                        				<?php } ?>  
										{{ Form::open(array( 'url' => 'schemas/projet/fileUpdate', 'class' => '' ,'files' => true )) }}
											<div class="fileUpload">
										    	<span>&nbsp;Changer le fichier&nbsp;</span>
										   		<input class="uploadBtn upload" type="file" name="file" />
										   		<input type="hidden" name="name" value="{{ $projet['slug'] }}" />
										   		<input type="hidden" name="id" value="{{ $projet['id'] }}" />
											</div>
											{{ Form::submit('Ok', array('class' => 'btn btn-primary')) }}
										{{ Form::close() }}
		                            </div>
		                            <div class="span2">
		                            </div>
                        			<div class="span1">
		                    			<div class="toggle-soft">
		                                	<div id="toggle-btn" data-status="{{ $projet['status'] }}" data-id="{{ $projet['id'] }}" class="toggle on"></div>
		                                </div>
		                            </div>
                        		</div>
                                
                        		<span class="isUpdated" style="display:none;">&nbsp;<i class="icon-check-sign"></i></span>
                        		
                        	@else
                                <span><i class="icon-tag"></i>{{ link_to('schemas/theme/'.$projet['theme']['id'], $projet['theme']['titre'] ) }}</span>
                                <span><i class="icon-tag"></i>{{ link_to('schemas/theme/'.$projet['subtheme']['id'], $projet['subtheme']['titre'] ) }}</span>
                        	@endif
                        	
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
                        	 <embed src="{{ asset('files/projets/'.$projet['slug'].'.pdf') }}" width="1024"  height="750"></embed>
                        </div>
                        
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- content close -->
        
	@endif  
					
@stop