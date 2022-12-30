<x-mail::message>
# Bonjour {{ $notifiable->name }}

Une nouvelle recette : {{ $create->title }},  est disponible. <br> 
Elle fait parti du/des regime(s) :
@foreach($create->regimes as $regime)

<ul>
<li>{{ $regime->type }}</li>
</ul>

@endforeach


@component('mail::button', ['url' => 'http://127.0.0.1:8000/recettes/'.$create->id.'/', 'color' => 'success'])
Voir la recette
@endcomponent


A bientôt,<br>
Sandrine Coupart
</x-mail::message>
