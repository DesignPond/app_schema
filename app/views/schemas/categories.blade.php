@extends('layouts.app')

@section('content')
			
	<div id="content">
	    <div class="container">
	        <div class="row"> 
	  
				@if ( !empty($categories) )
					@foreach($categories as $categorie) 
					
		                <!-- feature box begin -->
		                <div class="feature-box-small-icon span4">
		                    <div class="inner">
		                        <i class="icon-legal circle"></i>
		                        <div class="text">
		                            <h3>{{ link_to('schemas/categorie/'.$categorie->id, $categorie->titre ) }} </h3>
	
		                            <ul>
		                            	@if ( isset($themes[$categorie->id]) )
		                            		@foreach( $themes[$categorie->id] as $id => $theme) 	 
												<li>{{ link_to('schemas/theme/'.$id, $theme['titre'] ) }}</li>
				                            @endforeach
				                        @endif 
		                            </ul>		
									
		                        </div>
		                    </div>
		                </div>
		                <!-- feature box close -->
		                
					@endforeach
				@endif 
				
			</div>
		</div>
	</div>
					
@stop