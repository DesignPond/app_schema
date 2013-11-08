@extends('layouts.app')

@section('content')
	
	@if ( !empty($projet) )		
		
        <!-- content begin -->
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="span12">
						
                        <div class="post-content no-space-left">
                            <div class="post-text">
                                <h3><a href="css/#">{{ $projet->titre }}</a></h3>
                                {{ $projet->description }}
                            </div>
                        </div>
                        <div class="post-meta no-space-left"><span><i class="icon-user"></i>
                        	Par: <a href="#">{{ $projet->auteur }}</a></span> 
                        	<span><i class="icon-comment"></i><a href="#">10 Commentaires</a></span> 
                        </div>
                        
                        <div id="application"></div>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- content close -->
        
	@endif  
					
@stop