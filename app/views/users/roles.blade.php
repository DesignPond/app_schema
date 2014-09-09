@extends('layouts.master')

@section('content')

<!-- Subheader -->
@include('partials.subheader')
			
    <div id="content">
        <div class="container">
            <h3>Roles</h3>

                <div class="well">

                    <?php
                        echo '<pre>';
                        print_r($roles);
                        echo '</pre>';
                    ?>

                </div>

            </div>
        </div>
    </div>
	
@stop