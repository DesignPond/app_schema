@extends('layouts.master')

@section('content')

<!-- Subheader -->
@include('partials.subheader')

<?php  $custom = new Custom; ?>

<div class="content">
    <div class="container profile">

         <div class="row">
            <div class="span1 widget">
                <ul class="">
                    <li>Nom</li>
                    <li>Email</li>
                </ul>
            </div>
            <div class="span9 widget">
                <ul>
                    <li>{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</li>
                    <li><a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a></li>
                </ul>
            </div>
             <div class="span2">

             </div>

        </div>

    </div>
</div>

@if(!empty($sorting))
    @foreach($sorting as $sorted)

        <div id="content">
            <div class="container">

                <div class="row">
                    <div class="span4">
                        <h3>{{ key($sorting) }}</h3>
                    </div>
                    <div class="span8">
                        <dl class="icones pull-right">
                            <dt><img src="{{ asset('images/icon/actif.png') }}" alt="icone" /></dt>
                            <dd>Actif</dd>
                            <dt><img src="{{ asset('images/icon/pending.png') }}" alt="icone" /></dt>
                            <dd>Brouillon</dd>
                            <dt><img src="{{ asset('images/icon/submitted.png') }}" alt="icone" /></dt>
                            <dd class="big">Soumis pour approbation</dd>
                            <dt><img src="{{ asset('images/icon/revision.png') }}" alt="icone" /></dt>
                            <dd>En révision</dd>
                        </dl>
                    </div>
                </div>

                @if(!empty($sorted))
                    @foreach($sorted as $categorie => $projets)

                    <div class="row">
                        <div class="span12 gallery user-gallery">

                        <h4>{{ $categorie }}</h4>

                        @if(!empty($sorted))
                            @foreach($projets as $projet)

                                <!-- gallery item -->
                                <div class="item">
                                    <p class="subtheme"><i class="icon-tag"></i>{{ $projet['subtheme']['titre'] }}</p>
                                    <div class="picframe" style="background:{{ $projet['theme']['couleur_secondaire'] }};">
                                        <a href="#" class="status {{ $projet['status'] }}"></a>
                                        <span class="itemColor" style="background:{{ $projet['theme']['couleur_primaire'] }};">
                                            <a href="{{ url('compose', array('id' => $projet['id'] ) ) }}">
                                                <img src="{{ asset('images/icon_projet.png') }}" alt="icone" />
                                            </a>
                                        </span>
                                        <span class="itemInfos">
                                            <h4>{{ link_to('compose/'.$projet['id'], $projet['titre']) }}</h4>
                                            <p>{{ $projet['subtheme']['titre'] }}</p>
                                        </span>

                                    </div>
                                    <div class="optionsProjet">

                                        @if($projet['status'] == 'pending' || $projet['status'] == 'revision')

                                            {{ Form::open(array('method' => 'POST','url' => array('compose/status')))}}
                                                <input type="hidden" value="{{ $projet['id'] }}" name="id">
                                                <input type="hidden" value="submitted" name="status">
                                                <button class="btn btn-mini option-assign">Soumettre</button>
                                            {{ Form::close() }}

                                        @endif

                                        <a href="{{ url('compose/'.$projet['id'].'/delete') }}" data-action="Projet" class="deleteAction btn btn-mini option-delete btn-last">
                                            Supprimer
                                        </a>

                                    </div>
                                </div>
                                <!-- close gallery item -->
                            @endforeach
                        @endif

                        </div>
                    </div>

                    @endforeach
                @endif
             </div>
        </div>

   @endforeach
@endif

@stop