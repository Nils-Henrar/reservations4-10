@extends ('layouts.main')

@section ('title', 'Fiche d\'un type')

@section ('content')

<h1 class="text-2xl mt-4">Type : {{ $type->type }}</h1>

<div class="mt-4">
    <a href="{{ route('type.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline">Back</a>
</div>

@endsection