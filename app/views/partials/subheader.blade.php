<!-- subheader begin -->
<div id="subheader">
    <div class="container">
        <div class="row">
            <div class="span12">
                <h1>{{ $titre }}</h1>
                <span>{{ $soustitre }}</span>
                <ul class="crumb"></ul>
            </div>
        </div>
    </div>
</div>
<!-- subheader close -->

@if( Session::has('status'))
<div class="container">
    <div class="row">
        <div class="span12">
            <div class="alert alert-{{ Session::get('status') }}">

                @if(Session::has('message'))
                    {{ Session::get('message') }}
                @endif

                <button class="close" data-dismiss="alert" type="button">×</button>
            </div>
        </div>
    </div>
</div>
@endif