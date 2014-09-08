@extends('layouts.master')

@section('content')

<!-- Subheader -->
@include('partials.subheader')

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
		            		<div class="span12 text-center">	
		            			<a class="btn btn-primary marge-bottom" href="{{ $url }}">Fermer</a>
		            			
		            			
		            			<?php
		            				
		            				$map = 'pdf/html/'.$_GET['show'].'/'.$_GET['show'].'.html';
		            			
									if (File::exists($map)){ ?>
									
										<iframe id="IframeId" scrolling="no" src="<?php echo asset($map); ?>" width="100%" frameborder="0"></iframe>
									    
									<?php } else { ?>
																	
									<img src="{{asset('files/projets/'.$_GET['show'].'.jpg');}}" class="zoom_projet" data-zoom-image="{{ asset('files/projets/'.$_GET['show'].'.jpg'); }}" alt="" />
		            			
									<?php } ?>
		            			
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
									
									<?php $thumb = 'files/projets/'.$projet.'.jpg'; 
									
									if (File::exists($thumb)){ ?>
									
				                    <div class="span4">	                  
				                       <p class="schemas"><a href="{{ $url }}?show={{ $projet }}"><img src="{{ asset($thumb); }}" alt="" /></a></p>
				                    </div>
				                    
				                    <?php } ?>
				                    
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