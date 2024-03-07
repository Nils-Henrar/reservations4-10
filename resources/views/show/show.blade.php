@extends ('layouts.main')

@section ('title', 'Fiche d\'une représentation')

@section ('content')


<article>

    <h1 class="text-3xl mt-4"><strong>{{ $show->title }}</strong></h1>



    @if ($show->poster_url)
    <p class="mt-4"><img src="{{ asset('images/'.$show->poster_url) }}" alt="{{ $show->title }}" width="200"></p>
    @endif

    <p class="mt-4 md:w-1/2"><strong>Résumé : </strong>{{ $show->description }}</p>


    <p class="mt-4"><strong>Prix :</strong> {{ $show->price }} €</p>


    @if ($show->bookable)
    <p class="mt-4"><em>Réservable</em></p>
    @else
    <p class="mt-4"><em>Non réservable</em></p>
    @endif

    @if ($show->location)

    <h3 class="text-2xl mt-12"><strong>Lieu</strong></h3>
    <p class="mt-4">Lieu du spectacle : {{ $show->location->designation }}</p>

    <p class="mt-4">Adresse : {{ $show->location->address }},
        {{ $show->location->locality->postal_code }} {{ $show->location->locality->locality }}
    </p>

    @if ($show->location->website)
    <p class="mt-4">
        Site web : <a href="{{ $show->location->website }}" class="text-blue-500 hover:text-blue-700 visited:text-purple-500">{{ $show->location->website }}</a>
    </p>

    @endif

    @if ($show->location->phone)
    <p class="mt-4">Téléphone : {{ $show->location->phone }}</p>
    @endif

    @endif



    <!-- affichage des représentations -->

    <h2 class="text-2xl mt-12"><strong>Liste des représentations</strong></h2>
    @if ($show->representations->count() >= 1)
    <ul class="mt-4">
        @foreach ($show->representations as $representation)
        <li class="list-disc ml-8">
            {{ $representation->when }}
            @if ($representation->location)
            <span>({{ $representation->location->designation }})</span>
            @elseif ($representation->show->location)
            <span>({{ $representation->show->location->designation }})</span>
            @else
            <span>(à déterminer)</span>
            @endif
        </li>
        @endforeach
    </ul>
    @else
    <p class="mt-4">Pas de représentation pour le moment</p>
    @endif
</article>

<div class="mt-4">
    <a href="{{ route('show.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline">Retour</a>
</div>

@endsection