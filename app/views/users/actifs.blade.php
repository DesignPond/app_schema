@extends('layouts.master')

@section('content')

<!-- Subheader -->
@include('partials.subheader')

<div id="content">
    <div class="container">
        <div class="row">
            <div class="span12">
                <h3><img src="{{ asset('images/icon/actif.png') }}" alt="icone" class="icon-title-manage" /> &nbsp;Projets actifs</h3>
            </div>
        </div>
        <div class="row">
            <div class="span12 gallery user-gallery">

                @if(!empty($projets))
                    @foreach($projets as $status => $liste)
                        @foreach($liste as $projet)
                            <!-- gallery item -->
                            <div class="item">

                                @include('partials.projet')

                                <div class="optionsProjet">

                                    {{ Form::open(array('method' => 'POST','url' => array('compose/status')))}}
                                        <input type="hidden" value="{{ $projet['id'] }}" name="id">
                                        <input type="hidden" value="revision" name="status">
                                        <button class="btn btn-mini option-assign">A réviser</button>
                                    {{ Form::close() }}

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