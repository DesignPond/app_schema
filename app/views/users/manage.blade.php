@extends('layouts.master')

@section('content')

<!-- Subheader -->
@include('partials.subheader')

<div id="content">
    <div class="container">
        <div class="row">
            <div class="span12">
                <h3>Projet soumis pour approbation ou révision</h3>
            </div>
        </div>
        <div class="row">
            <div class="span12 gallery user-gallery">

                @if(!empty($projets))
                    @foreach($projets as $status => $liste)
                        <h4>{{ ucfirst($status) }}</h4>
                        @foreach($liste as $projet)
                            <!-- gallery item -->
                            <div class="item">
                                <div class="picframe" style="background:{{ $projet['theme']['couleur_secondaire'] }};">
                                    <span class="itemColor" style="background:{{ $projet['theme']['couleur_primaire'] }};">
                                        <a href="{{ url('compose', array('id' => $projet['id'] ) ) }}"><img src="{{ asset('images/icon_projet.png') }}" alt="icone" /></a>
                                    </span>
                                    <span class="itemInfos">
                                        <h4>{{ link_to('compose/'.$projet['id'], $projet['titre']) }}</h4>
                                        <p>{{ $projet['user']['prenom'] }} {{ $projet['user']['nom'] }}</p>
                                    </span>
                                </div>
                                <div class="optionsProjet">

                                    {{ Form::open(array('method' => 'POST','url' => array('compose/status')))}}
                                        <input type="hidden" value="{{ $projet['id'] }}" name="id">
                                        <input type="hidden" value="actif" name="status">
                                        <button class="btn btn-mini option-approuve">Approuver</button>
                                    {{ Form::close() }}

                                    @if($status == 'submitted')
                                        {{ Form::open(array('method' => 'POST','url' => array('compose/status')))}}
                                            <input type="hidden" value="{{ $projet['id'] }}" name="id">
                                            <input type="hidden" value="revision" name="status">
                                            <button class="btn btn-mini option-assign">A reviser</button>
                                        {{ Form::close() }}
                                    @endif

                                    <a href="{{ url('compose/'.$projet['id'].'/delete') }}"
                                       data-action="Projet"
                                       class="deleteAction btn btn-mini option-delete btn-last">
                                        Supprimer
                                    </a>

                                </div>
                            </div>
                            <!-- close gallery item -->
                        @endforeach
                        <hr/>
                    @endforeach
                @endif

            </div>
        </div>

    </div>
</div>

@stop