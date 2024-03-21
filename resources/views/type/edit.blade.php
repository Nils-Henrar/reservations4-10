@extends ('layouts.main')

@section ('title', 'Edit type')

@section ('content')

<h1 class="text-2xl">Modifier un type</h1>

<form action="{{ route('type.update', $type->id) }}" method="POST" class="mt-4">

    @csrf
    @method('PUT')

    <div class="mb-4">
        <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Type</label>
        <input type="text" name="type" id="type" @if(old('type')) value="{{ old('type') }}" @else value="{{ $type->type }}" @endif class="@error('type') is-invalid @enderror shadow appearance-none border rounded w-full py-1 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

        @error('type')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="flex items-center justify-between">
        <a href="{{ route('type.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline">Back</a>
        <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger mt-4">
        <h2>Listes des erreurs de validation</h2>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

</form>

@endsection