@extends('layouts.app2')

@section('content')

<br>
<br>
@if (session('success'))
    <br>
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    <br>
    <br>
@endif

@if (session('error'))
    <br>
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    <br>
    <br>
@endif

<div class="container mx-auto px-4">
    <h1 class="text-3xl py-4 border-b mb-10">Editace cyklistů</h1>

    <form method="POST" enctype="multipart/form-data" action="/rider/multi-edit/array" class="bg-white bg-accent-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')

        @foreach($riders as $index => $item)
        <h2 class="text-2xl py-2 border-b mb-4">{{ $item->first_name }} {{ $item->last_name }}</h2>
        <input type="hidden" name="ids[]" value="{{ $item->id }}">

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name_{{ $index }}">
                Jméno:
            </label>
            <input value="{{ $item->first_name }}" class="bg-accent appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-accent-outline" id="first_name_{{ $index }}" name="first_name[{{ $index }}]" type="text"> 
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name_{{ $index }}">
                Přijmení:
            </label>
            <input value="{{ $item->last_name }}" class="bg-accent appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-accent-outline" id="last_name_{{ $index }}" name="last_name[{{ $index }}]" type="text" required>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="date_of_birth_{{ $index }}">
                Datum narození:
            </label>
            <input value="{{ $item->date_of_birth }}" class="bg-accent appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-accent-outline" id="date_of_birth_{{ $index }}" name="date_of_birth[{{ $index }}]" type="date" required>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="place_of_birth_{{ $index }}">
                Místo narození:
            </label>
            <input value="{{ $item->place_of_birth }}" class="bg-accent appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-accent-outline" id="place_of_birth_{{ $index }}" name="place_of_birth[{{ $index }}]" type="text" required>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="photo_{{ $index }}">
                Fotka:
            </label>
            <input class="input-primary appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:input-primary-outline" id="photo_{{ $index }}" name="photo[{{ $index }}]" type="file" accept="image/png, image/jpeg">
            @if($item->photo)
                <img src="{{ asset('obrazky/' . $item->photo) }}" alt="card-image" class="object-cover w-full h-full" />
            @endif
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="height_{{ $index }}">
                Výška:
            </label>
            <input value="{{ $item->height }}" class="bg-accent appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-accent-outline" id="height_{{ $index }}" name="height[{{ $index }}]" type="text" required>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="weight_{{ $index }}">
                Váha:
            </label>
            <input value="{{ $item->weight }}" class="bg-accent appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-accent-outline" id="weight_{{ $index }}" name="weight[{{ $index }}]" type="text" required>
        </div>
        <br>
        <br>
        <br>
        @endforeach

        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:bg-accent-outline" type="submit">
                Potvrdit
            </button>
        </div>
    </form>
</div>
@endsection
