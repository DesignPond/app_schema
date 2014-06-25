@extends('layouts.app')

@section('content')

<?php  $custom = new Custom; ?>
	
<div id="content">
    <div class="container">
        <div class="row"> 
		  
				<!-- content begin -->
		        <div id="content">
		            <div class="container">
		            
		            <?php $url = Request::url(); ?>
		            
		            @if(isset($_GET['show']))
		            	<div class="row">
		            		<div class="span10 offset1 text-center">	
		            			<a class="btn btn-primary marge-bottom" href="{{ $url }}">Fermer</a>
		            			<img src="{{ asset('files/projets/'.$_GET['show'].'.jpg'); }}" class="zoom_projet" data-zoom-image="{{ asset('files/projets/'.$_GET['show'].'.jpg'); }}" alt="" />
		            			<a class="btn btn-primary marge-top" href="{{ $url }}">Fermer</a>
		            		</div>
						</div>
		            @else
		            
			            @if(!empty($projets))	
			            	  
			            	<a class="btn btn-primary marge-bottom" href="{{ url('schemas/categorie/') }}"><i class="icon-arrow-left"></i> Retour aux catégories</a> 
			            	            
			            	<?php $rows = array_chunk($projets, 3); ?>
		
			              	@foreach($rows as $row)
								<div class="row">
									@foreach($row as $projet)
				                    <div class="span4">	                  
				                       <p class="schemas"><a href="{{ $url }}?show={{ $projet }}"><img src="{{ asset('files/projets/'.$projet.'.jpg'); }}" alt="" /></a></p>
				                    </div>
				                    @endforeach  
				                </div>
				               @endforeach
				               
						 @endif
						 
					@endif
					
		            </div>
		        </div>
		        <!-- content close -->
			 	
		</div>
	</div>
</div>
					
@stop