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
                 @if(Auth::user()->hasRole('validate'))
                    <a href="{{ url('manage') }}" class="btn btn-primary">Gérer les projets</a>
                 @endif
             </div>

        </div>

    </div>
</div>

@if(!empty($sorting))
    @foreach($sorting as $sorted)

        <div id="content">
            <div class="container">

                <div class="row">
                    <div class="span12">
                        <h3>{{ key($sorting) }}</h3>
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
                                    <div class="status {{ $projet['status'] }}"></div>
                                    <div class="picframe" style="background:{{ $projet['theme']['couleur_secondaire'] }};">
                                        <span class="itemColor" style="background:{{ $projet['theme']['couleur_primaire'] }};">
                                            <a href="{{ url('compose', array('id' => $projet['id'] ) ) }}">
                                                <img src="{{ asset('images/icon_projet.png') }}" alt="icone" />
                                            </a>
                                        </span>
                                        <span class="itemInfos"><h4>{{ link_to('compose/'.$projet['id'], $projet['titre']) }}</h4></span>
                                    </div>
                                    <div class="optionsProjet">
                                        <a href="#" class="btn btn-mini option-approuve">Approuver</a>
                                        <a href="#" class="btn btn-mini option-assign">Assigner</a>
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