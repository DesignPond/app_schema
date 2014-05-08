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
						?>												
						
										
							@foreach($themes as $theme)
							<ul class="categoriesList clearfix">
								<li class="principal">
									<a style="background:<?php echo $theme['couleur_primaire']; ?>;" href=""><span><?php echo $theme['titre']; ?></span>
										
											<i style="border-color: transparent transparent transparent <?php echo $theme['couleur_primaire']; ?>;" class="triangle_droit"></i>
										
									</a>
									<?php if($i < $nbr){  ?>
										<i style="border-color: <?php echo $theme['couleur_primaire']; ?> transparent transparent transparent;" class="triangle_bottom"></i>
									<?php } ?>
								</li>
								@if ( isset($subthemes[$theme['id']]) )
								
									@foreach($subthemes[$theme['id']] as $subtheme)
									
										<li><a style="background:<?php echo $theme['couleur_secondaire']; ?>;" href="{{ url('schemas/subtheme/'.$subtheme['id']) }}"><span><?php echo $subtheme['titre']; ?></span></a></li>
									
									@endforeach
									
								@endif 
								
								
								<?php $i++; ?>
								</ul>	
								
							@endforeach
											
											
					@endif 
	    
		        @endif     
		</div>
	</div>
					
@stop