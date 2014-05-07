@extends('layouts.app')

@section('content')
			
	<div id="content">
	    <div class="container">

				@if ( !empty($categorie) )
					
					<h2>{{ $categorie->titre }}</h2>
					
					@if( !$categorie->theme->isEmpty() )
						
						<?php 
							$i      = 1;
							$themes = $categorie->theme->toArray();
							$nbr    = count($themes); 
							$chunks = array_chunk($themes, 7);
						?>
												
						@foreach($chunks as $chunk)	
						<ul class="categoriesList clearfix">				
							@foreach($chunk as $theme)
							
								<li>
									<a style="background:<?php echo $theme['couleur_primaire']; ?>;" href=""><span><?php echo $theme['titre']; ?></span>
										<?php if($i < $nbr){  ?>
											<i style="border-color: transparent transparent transparent <?php echo $theme['couleur_primaire']; ?>;" class="triangle_droit"></i>
										<?php } ?>
									</a>
									<i style="border-color: transparent transparent <?php echo $theme['couleur_primaire']; ?> transparent;" class="triangle_bottom"></i>
									@if ( isset($subthemes[$theme['id']]) )
										<ul>
											@foreach($subthemes[$theme['id']] as $subtheme)
												<li><a style="background:<?php echo $theme['couleur_secondaire']; ?>;" href="{{ url('schemas/theme/'.$subtheme['id']) }}"><?php echo $subtheme['titre']; ?></a></li>
											@endforeach
										</ul>
									@endif 
								</li>
								
								<?php $i++; ?>
								
							@endforeach
						</ul>
						@endforeach
											
					@endif 
	    
		        @endif     
		</div>
	</div>
					
@stop