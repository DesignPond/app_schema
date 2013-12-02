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
                                <h3><span data-column="titre" data-id="{{ $projet['id'] }}" class="edit_content">{{ $projet['titre'] }}</span></h3>
                                <span data-column="description" data-id="{{ $projet['id'] }}" class="edit_content">{{ $projet['description'] }}</span>
                            </div>
                        </div>
                        <div class="post-meta no-space-left"><span><i class="icon-user"></i>
                        	Par: <a href="#">{{ $projet['user']['prenom'] }} {{ $projet['user']['nom'] }}</a></span> 
                        	<span><i class="icon-tag"></i>{{ link_to('schemas/theme/'.$projet['theme']['id'], $projet['theme']['titre'] ) }}</span>
                        </div>
                        
                        <div id="controls" class="row">
	                         <div id="colors" class="span3">
	                         	<p>Couleur</p><input id="colorPicker" class="simple_color" value="{{ $projet['theme']['couleur'] }}"/>
	                         </div>
	                         <div id="shapes" class="span7">
				                <button class="btn"  id="add"><span class="car"></span>Ajouter</button>
								<button data-position="down"  class="btn arrow"><span class="down"></span>Bas</button>
						        <button data-position="left"  class="btn arrow"><span class="left"></span>Gauche</button>
						        <button data-position="right" class="btn arrow"><span class="right"></span>Droite</button>
						        <button data-position="up"    class="btn arrow"><span class="up"></span>Haut</button>
				            </div>
				            <div class="span1 text-right">
				            	<div class="toggle-soft">
                                	<div data-id="{{ $projet['id'] }}" class="toggle on"></div>
                                </div>
				            </div>
				            <div class="span1 text-right">
				            	{{ link_to('schemas/projet/schema/'.$projet['id'], 'Terminer', array( 'id' => 'save' , 'class' => 'btn btn-primary save') ) }}
				             </div>
                        </div>
                        
                        <div id="application" class="projet_width">
						   	<div id="content-application"></div>
	                        <p id="emptyProjet">Le projet est vide</p>	 
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- content close -->
        
	@endif  
					
@stop