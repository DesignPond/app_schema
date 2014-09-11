<p class="theme"><i class="icon-tag"></i>{{ $projet['theme']['titre'] }}</p>
<p class="subtheme"><i class="icon-tag"></i>{{ $projet['subtheme']['titre'] }}</p>

<div class="picframe" style="background:{{ $projet['theme']['couleur_secondaire'] }};">
    <span class="itemColor" style="background:{{ $projet['theme']['couleur_primaire'] }};">
        <a class="popup_modal" href="{{ url('compose/modal', array('id' => $projet['id'] ) ) }}">
            <img src="{{ asset('images/icon_projet.png') }}" alt="icone" />
        </a>
    </span>
    <span class="itemInfos">
        <h4>{{ link_to( 'compose/modal/'.$projet['id'], $projet['titre'], array('class' => 'popup_modal') ) }}</h4>
        <p>{{ $projet['user']['prenom'] }} {{ $projet['user']['nom'] }}</p>
    </span>
    <span class="projetRang edit_rang" data-column="rang" data-id="{{ $projet['id'] }}">{{ $projet['rang'] }}</span>
</div>