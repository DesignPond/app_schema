@extends('layouts.master')

@section('content')

<!-- content begin -->
<div id="content">
    <div class="container">
        <div class="row">

            <div class="span3">&nbsp;</div>
            <div id="page-notfound" class="span6">
                <h1>404</h1>
                <div class="notfound">
                    <p>La page demandé n'existe pas</p>
                    <p><i class="icon-reply"></i> <a href="/">Retour au site</a></p>

                    <object type="image/svg+xml" data="{{ asset('images/magistrate.svg') }}"></object>

                </div>
            </div>
            <div class="span3">&nbsp;</div>

        </div>
    </div>
</div>

@stop