@extends('layouts.app')

@section('content')
	
	<h3>Derniers Projets</h3>
    <ul class="bloglist-small">
	@if ( !empty($categories) )
		@foreach($categories as $categorie) 
		
        <li>
            <a href="<?php echo action('SchemaController@projets', array('id' => $categorie->id ) ); ?>">{{ $categorie->titre }}</a>
        </li>
        
  		@endforeach
	@endif      
    </ul>
	
@stop