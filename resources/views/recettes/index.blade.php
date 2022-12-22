<h1> Index recette</h1>

@foreach($recettes as $recette)

    <h1> {{ $recette->id }}</h1>
    <h2> {{ $recette->title }}</h2>
    @foreach($recette->regimes as $regime)
        <h3> {{ $regime->type }}</h3>
    @endforeach



@endforeach