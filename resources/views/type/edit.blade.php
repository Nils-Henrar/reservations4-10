@extends ('layouts.main')

@section ('title', 'Edit type')

@section ('content')

<h1 class="text-2xl">Modifier un type</h1>

<form action="{{ route('type.update', $type->id) }}" method="POST" class="mt-4">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Type</label>
        <input type="text" name="type" id="type" value="{{ $type->type }}" class="shadow appearance-none border rounded w-full py-1 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <div class="flex items-center justify-between">
        <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
        <a href="{{ route('type.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline">Back</a>
    </div>
</form>