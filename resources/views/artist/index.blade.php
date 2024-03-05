@extends ('layouts.main')

@section ('title', 'Liste des artistes')

@section ('content')


<h1 class="text-2xl">Artists</h1>

<!-- mettre tout en tailwind -->



<table class="table-fixed w-full mt-4">
    <thead class="bg-gray-200 text-left">
        <tr>
            <th class="w-1/4 ...">Firstname</th>
            <th class="w-1/4 ...">Lastname</th>
            <th class="w-1/4 ...">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($artists as $artist)
        <tr>
            <td>{{ $artist->firstname }}</td>
            <td>{{ $artist->lastname }}</td>
            <td class="flex">
                <a href="{{ route('artist.show', $artist->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded mt-2 mr-2">Show</a>
                <a href="{{ route('artist.edit', $artist->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded mt-2 mr-2">Edit</a>
                <form action="{{ route('artist.delete', $artist->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded mt-2">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>


<a href="{{ route('artist.create') }}" class="mb-4 bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded">Add an artist</a>

@endsection