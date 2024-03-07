@extends ('layouts.main')

@section ('title', 'Fiche d\'une représentation')

@section ('content')


<article>

    <h1 class="text-3xl mt-4">{{ $show->title }}</h1>



    @if ($show->poster_url)
    <p class="mt-4"><img src="{{ asset('images/'.$show->poster_url) }}" alt="{{ $show->title }}" width="200"></p>
    @endif

    <p class="mt-4 md:w-1/2">{{ $show->description }}</p>


    <p class="mt-4">Prix : {{ $show->price }} €</p>


    @if ($show->bookable)
    <p class="mt-4"><em>Réservable</em></p>
    @else
    <p class="mt-4"><em>Non réservable</em></p>
    @endif

    @if ($show->location)

    <h3 class="text-xl mt-12">Lieu</h3>
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

    <div class="mt-4">
        <a href="{{ route('show.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline">Retour</a>
    </div>

</article>

@endsection