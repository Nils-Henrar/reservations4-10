@extends ('layouts.main')

@section ('title', 'Liste des artistes')

@section ('content')


<h1 class="text-2xl">Liste des artistes</h1>

<!-- mettre tout en tailwind -->



<table class="table-fixed w-full mt-4 mb-8">
    <thead class="bg-gray-200 text-left">
        <tr>
            <th class="w-1/4- ...">Nom</th>
            <th class="w-1/4- ...">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($artists as $artist)
        <tr>
            <td>{{ $artist->firstname }} {{ $artist->lastname }}</td>
            <td class="flex">
                <a href="{{ route('artist.show', $artist->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded mt-2 mr-2">Profil</a>
                <a href="{{ route('artist.edit', $artist->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded mt-2 mr-2">Modifier</a>
                <form action="{{ route('artist.delete', $artist->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded mt-2">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>


<a href="{{ route('artist.create') }}" class="mb-4 bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded">Ajouter un artiste</a>

@endsection