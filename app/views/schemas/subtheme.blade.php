@extends('layouts.app')

@section('content')

<?php  $custom = new Custom; ?>
	
<div id="content">
    <div class="container">
        <div class="row"> 
	
				<!-- content begin -->
		        <div id="content">
		            <div class="container">
		            
		            
		            <?php
		            
						echo '<pre>';
						print_r($projets);
						echo '</pre>';

					?>
		                <!--
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
						-->

		            </div>
		        </div>
		        <!-- content close -->
			 	
		</div>
	</div>
</div>
					
@stop