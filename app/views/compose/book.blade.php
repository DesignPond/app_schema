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
                                <a class="btn btn-primary marge-bottom" href="{{ url('schemas/categorie') }}">Retour à la liste</a>
                                <h3>{{ $projet['titre'] }}</h3>
                                <p>{{ $projet['description'] }}</p>
                            </div>
                        </div>
                        <div class="post-meta no-space-left">
                            <span><i class="icon-tag"></i>{{ link_to('schemas/theme/'.$projet['theme']['id'], $projet['theme']['titre'] ) }}</span>
                            <span><i class="icon-tag"></i>{{ link_to('schemas/theme/'.$projet['subtheme']['id'], $projet['subtheme']['titre'] ) }}</span>
                        </div>
                        <div class="text-center">
                                <?php

                                $map = 'pdf/html/'.$projet->id.'/'.$projet->id.'.html';

                                if (File::exists($map)){ ?>

                                    <iframe id="IframeId" scrolling="no" src="<?php echo asset($map); ?>" width="100%" frameborder="0"></iframe>

                                <?php } else { ?>
                                    <img src="{{asset('files/projets/'.$projet->id.'.jpg');}}" class="zoom_projet" data-zoom-image="{{ asset('files/projets/'.$projet->id.'.jpg'); }}" alt="" />
                                <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content close -->
        
	@endif
@stop