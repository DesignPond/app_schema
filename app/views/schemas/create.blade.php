@extends('layouts.app')

@section('content')

<!-- content begin -->
<div id="content">
    <div class="container">
        <div class="row">
            <div class="span12">
			
				<h3>Créer un schéma</h3>
			                
			    <ul class="errors">
					 @foreach($errors->all() as $message)
					 <li>{{ $message }}</li>
					 @endforeach
				 </ul>
				 
				  <div class="form_holder">	
				  					  
						{{ Form::open(array( 'url' => 'schemas/projet', 'class' => '')) }}
			
						<div class="row">
						{{ Form::label('titre', 'Titre' , array('class' => 'span2 ')) }}
						{{ Form::text('titre', '' , array('class' => 'span3 required')) }}
						</div>
						<div class="row">
						{{ Form::label('auteur', 'Auteur', array('class' => 'span2')) }}
						{{ Form::text('auteur', '' , array('class' => 'span3 required')) }}
						</div>
						<div class="row">
						{{ Form::label('description', 'Description', array('class' => 'span2')) }}
						{{ Form::textarea('description', '', array('class' => 'span3 required redactor')) }}
						</div>
						<div class="row">
						{{ Form::label('Catégorie', '' , array('class' => 'span2')) }}
						{{ Form::select('categorie', $categories ,'' , array('class' => 'span3 required')) }}
						</div>	
						<div class="row">
						{{ Form::label('Thème', '' , array('class' => 'span2')) }}
						{{ Form::select('refTheme', $themes, '' , array('class' => 'span3 required', 'id' => 'theme' )) }}
						</div>	
						<div class="row">
						{{ Form::label('Sous thème', '' ,array('class' => 'span2')) }}
						{{ Form::select('refSubtheme', $subthemes, '' , array('class' => 'span3', 'id' => 'subtheme')) }}
						</div>
						
						<br/>
						{{ Form::submit('Créer le schéma', array('class' => 'btn btn-primary')) }}
						<p class="clear"></p>
						{{ Form::close() }}
						
				  </div>

            </div>
        </div>
    </div>
</div>
	  
@stop