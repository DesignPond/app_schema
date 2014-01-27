@extends('layouts.app')

@section('content')

<!-- content begin -->
<div id="content">
    <div class="container">
        <div class="row">
            <div class="span12">	                
				 
				  <div class="form_holder">	
				  					  
						{{ Form::open(array( 'url' => 'schemas/projet', 'class' => '')) }}
			
						<div class="row">
						
						{{ Form::label('titre', 'Titre *' , array('class' => 'span2 ')) }}
						<div class="span4">{{ Form::text('titre', '' , array('class' => 'required')) }}</div>
							@foreach($errors->get('titre') as $message)<div class="span3 errors">{{ $message }}</div> @endforeach
						</div>
						
						{{ Form::hidden('user_id' , Auth::user()->id) }}
						
						<div class="row">
						{{ Form::label('description', 'Description', array('class' => 'span2')) }}
						<div class="span4">{{ Form::textarea('description', '', array('class' => 'required redactor')) }}</div>
						</div>
						
						<div class="row">
						{{ Form::label('Catégorie *', '' , array('class' => 'span2')) }}
						<div class="span4">{{ Form::select('categorie_id', $categories ,'' , array( 'id' => 'categorie', 'class' => 'required')) }}</div>
								@foreach($errors->get('categorie_id') as $message)<div class="span3 errors">{{ $message }}</div> @endforeach
						</div>	
						
						<div class="row">
						{{ Form::label('Thème *', '' , array('class' => 'span2')) }}
						<div class="span4">{{ Form::select('theme_id', $themes, '' , array('id' => 'theme', 'class' => 'required', 'id' => 'theme' )) }}</div>
								@foreach($errors->get('theme_id') as $message)<div class="span3 errors">{{ $message }}</div> @endforeach
						</div>	
						
						<br/>
						{{ Form::hidden('type', 'app') }}
						
						{{ Form::submit('Créer le schéma', array('class' => 'btn btn-primary')) }}
						<p class="clear"></p>
						{{ Form::close() }}
						
				  </div>

            </div>
        </div>
    </div>
</div>
	  
@stop