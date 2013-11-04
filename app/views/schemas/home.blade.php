@extends('layouts.master')

@section('content')
	
     <section class="row">
    		<h2>Catégories</h2>
	    	<div class="col-lg-6">	
				<div class="list-group">
				<?php
				if(!empty($catList)){
					echo '<pre>';
					print_r($catList);
					echo '</pre>';
				}
				?>
				</div>
			</div>
	    	
    </section>
	
@stop