@extends('layouts.app')

@section('content')
	
<!-- subheader begin -->
<div id="subheader">
    <div class="container">
        <div class="row">
            <div class="span12">
                <h1>Thème</h1>
                <span>{{ $theme[0]['titre'] }}</span>
                <ul class="crumb">
                    <li>{{ link_to('schemas/', 'Accueil' ) }}</li>
                    <li class="sep">/</li>
                    <li>Catégorie</li>
                    <li>Thème</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- subheader close -->
	
<div id="content">
    <div class="container">
        <div class="row"> 
	
			<?php
				echo '<pre>';
				print_r($subtheme);
				echo '</pre>';
			?>
			
			 @foreach($theme as $message)

			 	<pre>
					{{ print_r( $message) }}
			 	</pre>

			 @endforeach
			 	
		</div>
	</div>
</div>
					
@stop