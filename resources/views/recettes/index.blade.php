<h1> Index recette</h1>

@foreach($recettes as $recette)
    <h1> {{ $recette->id }}</h1>
    <h2> {{ $recette->title }}</h2>
    @foreach($recette->allergenes as $allergene)
        <h3> {{ $allergene->name }}</h3>
    @endforeach
@endforeach