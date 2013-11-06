@extends('layouts.app')

@section('content')
	
<!-- subheader begin -->
<div id="subheader">
    <div class="container">
        <div class="row">
            <div class="span12">
                <h1>Catégories</h1>
                <span>Toutes les catégories</span>
                <ul class="crumb">
                    <li>{{ link_to('schemas/', 'Accueil' ) }}</li>
                    <li class="sep">/</li>
                    <li>Catégories</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- subheader close -->
	
<div id="content">
    <div class="container">
        <div class="row"> 
  
			@if ( !empty($categories) )
				@foreach($categories as $categorie) 
				
	                <!-- feature box begin -->
	                <div class="feature-box-small-icon span4">
	                    <div class="inner">
	                        <i class="icon-legal circle"></i>
	                        <div class="text">
	                            <h3>{{ link_to('schemas/categorie/'.$categorie->id, $categorie->titre ) }} </h3>
	                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.
	                        </div>
	                    </div>
	                </div>
	                <!-- feature box close -->
	                
				@endforeach
			@endif 
			
		</div>
	</div>
</div>
					
@stop