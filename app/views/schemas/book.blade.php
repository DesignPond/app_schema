@extends('layouts.app')
@section('content')
	
	<?php  $custom = new Custom; ?>
	
	@if ( !empty($projet) )		
			
        <!-- content begin -->
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="span12 text-center">

                        <a class="btn btn-primary marge-bottom" href="{{ url('schemas/categorie') }}">Retour à la liste</a>

                            <?php

                            $map = 'pdf/html/'.$projet->id.'/'.$projet->id.'.html';

                            if (File::exists($map)){ ?>

                                <iframe id="IframeId" scrolling="no" src="<?php echo asset($map); ?>" width="100%" frameborder="0"></iframe>

                            <?php } else { ?>
                                <img src="{{asset('files/projets/'.$projet->id.'.jpg');}}" class="zoom_projet" data-zoom-image="{{ asset('files/projets/'.$projet->id.'.jpg'); }}" alt="" />
                            <?php } ?>

                        <a class="btn btn-primary marge-bottom" href="{{ url('schemas/categorie') }}">Retour à la liste</a>

                    </div>
                </div>
            </div>
        </div>
        <!-- content close -->
        
	@endif
@stop