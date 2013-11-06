@extends('layouts.app')

@section('content')
	
	@if ( !empty($projets) )
		@foreach($projets as $projet) 
		
		
		@endforeach
	@endif  
	
            <div class="span12">
            
            <div class="row">
                <!-- feature box begin -->
                <div class="feature-box-small-icon span4">
                    <div class="inner">
                        <i class="icon-twitter circle dark"></i>
                        <div class="text">
                            <h3>Twitter Bootstrap</h3>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.
                        </div>
                    </div>
                </div>
                <!-- feature box close -->

                <!-- feature box begin -->
                <div class="feature-box-small-icon span4">
                    <div class="inner">
                        <i class="icon-mail-forward circle dark"></i>
                        <div class="text">
                            <h3>Revolution Slider</h3>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.
                        </div>
                    </div>
                </div>
                <!-- feature box close -->

                <!-- feature box begin -->
                <div class="feature-box-small-icon span4">
                    <div class="inner">
                        <i class="icon-thumbs-up circle dark"></i>
                        <div class="text">
                            <h3>Font Awesome</h3>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.
                        </div>
                    </div>
                </div>
                <!-- feature box close -->


                <!-- feature box begin -->
                <div class="feature-box-small-icon span4">
                    <div class="inner">
                        <i class="icon-resize-full circle"></i>
                        <div class="text">
                            <h3>Responsive Design</h3>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.
                        </div>
                    </div>
                </div>
                <!-- feature box close -->

                <!-- feature box begin -->
                <div class="feature-box-small-icon span4">
                    <div class="inner">
                        <i class="icon-wrench circle"></i>
                        <div class="text">
                            <h3>Easy To Custom</h3>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.
                        </div>
                    </div>
                </div>
                <!-- feature box close -->

                <!-- feature box begin -->
                <div class="feature-box-small-icon span4">
                    <div class="inner">
                        <i class="icon-dashboard circle"></i>
                        <div class="text">
                            <h3>Fast Load</h3>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.
                        </div>
                    </div>
                </div>
                <!-- feature box close -->
            </div>

					
@stop