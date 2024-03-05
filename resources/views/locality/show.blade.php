@extends ('layouts.main')

@section ('title', 'Fiche d\'une localité')

@section ('content')

<h1 class="text-2xl mt-4">Localité : {{ $locality->postal_code }} - {{ $locality->locality }}</h1>

<div class="mt-4">
    <a href="{{ route('locality.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline">Back</a>
</div>

@endsection