@extends('layouts.main')

@section('title', 'Détail de l\'artiste')

@section('content')

<!-- en tailwind -->
<h1>{{ $artist->firstname }} {{ $artist->lastname }}</h1>

<h2 class="text-2xl mt-4">Liste des types</h2>
<ul class="mt-4">
    @foreach ($artist->types as $type)
    <li class="list-disc ml-8">
        {{$type->type}}
    </li>
    @endforeach
</ul>

<div class="flex mt-2 mb-4">
    <a href="{{ route('artist.edit', $artist->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded mt-2 mr-2">Edit</a>
    <form action="{{ route('artist.delete', $artist->id) }}" method="POST" class="mr-2">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded mt-2">Delete</button>
    </form>

</div>

<!-- retour espacé de la div -->
<a href="{{ route('artist.index') }}" class="bg-blue-500 hover:bg-blue-200 text-white font-bold py-1 px-3 rounded mt-2">Back</a>


@endsection