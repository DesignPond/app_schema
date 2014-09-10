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
                    <div class="post-text">
                        @if( ($isEditable == 'admin') || ($isEditable == 'editor') )
                        <h3 class="text-isEditable">
                            <span data-column="titre" data-id="{{ $projet['id'] }}" class="edit_content">{{ $projet['titre'] }}</span>
                            <i class="icon-edit icon-isEditable"></i>
                        </h3>
                        <p class="text-isEditable">
                            <span data-column="description" data-id="{{ $projet['id'] }}" class="edit_content">{{ $projet['description'] }}</span>
                            <i class="icon-edit icon-isEditable"></i>
                        </p>
                        @else
                            <h3>{{ $projet['titre'] }}</h3>
                            <p>{{ $projet['description'] }}</p>
                        @endif
                    </div>
                </div>

                <div class="post-meta no-space-left">

                    @if( ($isEditable == 'admin') || ($isEditable == 'editor') )
                        {{ Form::select('theme_id',$themes,$projet['theme']['id'], array('id' => 'theme-edit','data-id' => $projet['id'],'data-column' => 'theme_id' )) }}
                        <span class="isUpdated" style="display:none;">&nbsp;<i class="icon-check-sign"></i></span>
                    @else
                        <span><i class="icon-tag"></i>{{ link_to('theme/'.$projet['theme']['id'], $projet['theme']['titre'] ) }}</span>
                        <span><i class="icon-tag"></i>{{ link_to('theme/'.$projet['subtheme']['id'], $projet['subtheme']['titre'] ) }}</span>
                    @endif

                </div>

                <div id="controls" class="row">
                    <div id="colors" class="span3">
                        <p>Couleur</p><input id="colorPicker" class="simple_color" value="{{ $projet['theme']['couleur_primaire'] }}"/>
                    </div>
                    <div id="shapes" class="span7">
                        <button class="btn"  id="add"><span class="car"></span>Ajouter</button>
                        <button data-position="down"  class="btn arrow"><span class="down"></span>Bas</button>
                        <button data-position="left"  class="btn arrow"><span class="left"></span>Gauche</button>
                        <button data-position="right" class="btn arrow"><span class="right"></span>Droite</button>
                        <button data-position="up"    class="btn arrow"><span class="up"></span>Haut</button>
                    </div>
                    <div class="span2 text-right">
                        {{ link_to('compose/'.$projet['id'], 'Terminer', array( 'id' => 'save' , 'class' => 'btn btn-warning save') ) }}
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

<!-- My Modal HTML -->
<div id="mymodal" style="display: none;">
    <section>
        <label>Lien vers projet n°</label>
        <?php echo Form::select( 'list', $list ,'', array('id' => 'redactor_link_addmodal') ); ?> </p>
        <input type="hidden" id="redactor_link_addmodal_url" value="{{ action('ComposeController@modal'); }}" />
        <p><button class="btn btn-primary" id="mymodal-link">Appliquer</button></p>
    </section>
    <footer>
        <a href="#" class="redactor_modal_btn redactor_btn_modal_close">Fermer</a>
    </footer>
</div>

@endif

@stop