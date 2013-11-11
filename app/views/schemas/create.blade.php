@extends('layouts.app')

@section('content')

<!-- content begin -->
<div id="content">
    <div class="container">
        <div class="row">
            <div class="span12">
			
				<h3>Créer un schéma</h3>		                
				 
				  <div class="form_holder">	

				  		<ul class="errors">
							 @foreach($errors->all() as $message)
							 <li><i class="icon-exclamation-sign"></i> {{ $message }}</li>
							 @endforeach
						 </ul>
				  					  
						{{ Form::open(array( 'url' => 'schemas/projet', 'class' => '')) }}
			
						<div class="row">
						{{ Form::label('titre', 'Titre *' , array('class' => 'span2 ')) }}
						{{ Form::text('titre', '' , array('class' => 'span3 required')) }}
						</div>
						{{ Form::hidden('user_id' , Auth::user()->id) }}
						<div class="row">
						{{ Form::label('description', 'Description', array('class' => 'span2')) }}
						{{ Form::textarea('description', '', array('class' => 'span3 required redactor')) }}
						</div>
						<div class="row">
						{{ Form::label('Catégorie *', '' , array('class' => 'span2')) }}
						{{ Form::select('categorie', $categories ,'0' , array( 'id' => 'categorie', 'class' => 'span3 required')) }}
						</div>	
						<div class="row">
						{{ Form::label('Thème *', '' , array('class' => 'span2')) }}
						{{ Form::select('refTheme', $themes, '0' , array('id' => 'theme', 'class' => 'span3 required', 'id' => 'theme' )) }}
						</div>	
						<div class="row">
						{{ Form::label('Sous thème', '' ,array('class' => 'span2')) }}
						{{ Form::select('refSubtheme', $subthemes, '0' , array('id' => 'subtheme', 'class' => 'span3', 'id' => 'subtheme')) }}
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