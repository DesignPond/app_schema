@extends('layouts.master')

@section('content')
	
     <section class="row">
    		<h2>Catégories</h2>
	    	<div class="col-lg-6">	
				<div class="list-group">
				@if ( !empty($categories) )
						@foreach($categories as $categorie)
					        <a href="" class="list-group-item">    
					        	{{ $categorie->titre }}
					        </a>
					    @endforeach
				    @endif
				</div>
			</div>
	    	
    </section>
	
@stop