@extends ('layouts.main')

@section ('title', 'Edit artist')

@section ('content')

<h1 class="text-2xl">Edit artist</h1>

<form action="{{ route('artist.update', $artist->id) }}" method="POST" class="mt-4">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label for="firstname" class="block text-gray-700 text-sm font-bold mb-2">Firstname</label>
        <input type="text" name="firstname" id="firstname" @if(old('firstname')) value="{{ old('firstname') }}" @else value="{{ $artist->firstname }}" @endif class="@error('firstname') is-invalid @enderror shadow appearance-none border rounded w-full py-1 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('firstname')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>


    <div class="mb-4">
        <label for="lastname" class="block text-gray-700 text-sm font-bold mb-2">Lastname</label>
        <input type="text" name="lastname" id="lastname" @if(old('lastname')) value="{{ old('lastname') }}" @else value="{{ $artist->lastname }}" @endif class="@error('lastname') is-invalid @enderror shadow appearance-none border rounded w-full py-1 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    @error('lastname')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="flex items-center justify-between">
        <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
        <a href="{{ route('artist.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline">Back</a>
    </div>
</form>

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


@endsection