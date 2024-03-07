@extends ('layouts.main')

@section ('title', 'Fiche d\'un lieu')

@section ('content')

<h2 class="text-2xl mt-4">{{ $location->designation }}</h2>

<ul class="mt-4">
    <li>
        {{ $location->address }},
    </li>
    <li>
        {{ $location->locality->postal_code }} {{ $location->locality->locality }}
    </li>
    @if ($location->website)
    <li>
        <a href="{{ $location->website }}" class="text-blue-500 hover:text-blue-700 visited:text-purple-500">{{ $location->website }}</a>
    </li>
    @endif

    @if ($location->phone)
    <li>
        {{ $location->phone }}
    </li>
    @endif
</ul>


<h2 class="text-2xl mt-4">Liste des spectacles</h2>

<ul class="mt-4">
    @foreach ($location->shows as $show)
    <li class="list-disc ml-8">
        <a href="{{ route('show.show', $show->id) }}">{{ $show->title }}</a>
    </li>
    @endforeach

</ul>

<div class="mt-4">
    <a href="{{ route('location.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline">Retour</a>
</div>

@endsection