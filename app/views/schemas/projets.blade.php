@extends('layouts.app')

@section('content')
	
	<h3>Derniers Projets</h3>
    <ul class="bloglist-small">
	@if ( !empty($projets) )
		@foreach($projets as $projet) 
		
		<?php
		
			 $Carbon = new Carbon\Carbon();
			 $date   = $Carbon->createFromFormat('Y-m-d H:i:s', $projet->created_at);
			 
			 $day    = $date->format('d');  
			 $month  = $date->format('M'); 
		?>  
		
        <li>
            <div class="date-box">
                <span class="day">{{ $day }}</span>
                <span class="month">{{ $month }}</span>
            </div>
            <div class="txt">
                <h5><a href="css/#">{{ $projet->titre }}</a></h5>
                <span class="read">{{ $projet->description }}</span>
                <span class="info">{{ $projet->auteur }} <a href="css/#">Voir</a></span>
            </div>
        </li>
        
  		@endforeach
	@endif  
	</ul>
@stop