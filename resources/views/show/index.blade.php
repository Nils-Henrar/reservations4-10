@extends ('layouts.main')

@section ('title', 'Liste des représentations')

@section ('content')

<h2 class="text-3xl mt-2">Liste des représentations</h2>

<div class="flex">
    <a href="{{ route('show.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded mt-4 mb-4">Ajouter une représentation</a>
</div>

<div class="mt-4">
    <ul class="mt-4">
        @foreach ($shows as $show)
        <li class="text-align
        : left mb-4 mt-4">
            <!-- lien en tailwind -->
            <a href="{{ route('show.show', $show->id) }}" class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-1 px-3 rounded mt-4 mb-4 mr-2">{{ $show->title }}</a>


            <span> Prix : {{ $show->price }} € </span>

            <!-- nombre de représentations -->
            @if ($show->representations->count() ==1)
            -<span> 1 représentation </span>
            @elseif ($show->representations->count() > 1)
            -<span> {{ $show->representations->count() }} représentations </span>
            @else
            -<span> Pas de représentation </span>
            @endif

        </li>

        @endforeach
    </ul>
</div>

@endsection