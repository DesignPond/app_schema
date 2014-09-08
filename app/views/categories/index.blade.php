@extends('layouts.master')

@section('content')

    <!-- Subheader -->
    @include('partials.subheader')

	<div id="content">
	    <div class="container">

				@if ( !empty($categorie) )
					
					<h2>{{ $categorie->titre }}</h2>
					
					@if( !$categorie->theme->isEmpty() )
						
						<?php 
							$i      = 1;
							$themes = $categorie->theme->toArray();
							$nbr    = count($themes); 
/*
                         echo '<pre>';
                          print_r($liste);
                          echo '</pre>';*/
						?>

							@foreach($themes as $theme)
							<ul class="categoriesList clearfix">

								<li class="principal">
									<a style="background:<?php echo $theme['couleur_primaire']; ?>;" href=""><span><?php echo $theme['titre']; ?></span>
									    <i style="border-color: transparent transparent transparent <?php echo $theme['couleur_primaire']; ?>;" class="triangle_droite"></i>
									</a>
									<?php if($i < $nbr){  ?>
										<i style="border-color: <?php echo $theme['couleur_primaire']; ?> transparent transparent transparent;" class="triangle_bottom"></i>
									<?php } ?>
								</li>
								@if ( isset($subthemes[$theme['id']]) )
								
									@foreach($subthemes[$theme['id']] as $subtheme)
										<li>
                                            @if(!empty($liste) && isset($liste[$subtheme['id']]) && !empty($liste[$subtheme['id']]) && count($liste[$subtheme['id']]) > 1)
                                                <?php $drop = true; ?>
                                                <?php $link = '#'; ?>
                                            @else
                                                <?php $drop = null; ?>
                                                <?php $link = url('book/'.$liste[$subtheme['id']][0]['id']); ?>
                                            @endif
                                            <a style="background:<?php echo $theme['couleur_secondaire']; ?>;"href="{{ $link }}">
                                                <span><?php echo $subtheme['titre']; ?></span>
                                            </a>
                                            @if( $drop )
                                            <ul class="dropdown" style="background:<?php echo $theme['couleur_primaire']; ?>;">
                                                @foreach($liste[$subtheme['id']] as $projet)
                                                    <?php $type = ( $projet['type'] == 'app' ? 'compose' : 'book'); ?>
                                                    <li><a href="{{ url($type.'/'.$projet['id']) }}">{{ $projet['titre'] }}</a></li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </li>
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