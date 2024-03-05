@extends ('layouts.main')

@section ('title', 'Types')

@section ('content')

<h2 class="text-2xl">Types</h2>

<table class="table-fixed w-full mt-4">
    <thead class="bg-gray-200 text-left">
        <tr>
            <th class="w-1/4 ...">Type</th>
            <th class="w-1/4 ...">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($types as $type)
        <tr>
            <td>{{ $type->type }}</td>
            <td class="flex">
                <a href="{{ route('type.edit', $type->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-4 rounded mt-4 mb-4 mr-2 ">Edit</a>
                <form action="{{ route('type.delete', $type->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded mt-4 mr-2">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>