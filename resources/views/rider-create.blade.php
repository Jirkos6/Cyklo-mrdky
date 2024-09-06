@extends('layouts.app2')
@section('content')

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
    <h1 class="text-3xl py-4 border-b mb-10">Přidání cyklisty</h1>

    <form method="POST" enctype="multipart/form-data" action="/rider" class="bg-white bg-accent-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">
                Jméno:
            </label>
            <input class="bg-accent appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-accent-outline" id="first_name" name="first_name" type="text">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name">
                Přijmení:
            </label>
            <input class="bg-accent appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-accent-outline" id="last_name" name="last_name" type="text" required>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="date_of_birth">
                Datum narození:
            </label>
            <input class="bg-accent appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-accent-outline" id="date_of_birth" name="date_of_birth" type="date" required>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="place_of_birth">
                Místo narození:
            </label>
            <input class="bg-accent appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-accent-outline" id="place_of_birth" name="place_of_birth" type="text" required>
        </div>
        <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="photo">
                    Fotka:
                </label>
                <input class="input-primary appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:input-primary-outline" id="photo" name="photo" type="file" required accept="image/png, image/jpeg">
            </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="height">
                Výška:
            </label>
            <input class="bg-accent appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-accent-outline" id="height" name="height" type="text" required>
        </div>  
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="weight">
                Váha:
            </label>
            <input class="bg-accent appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-accent-outline" id="weight" name="weight" type="text" required>
        </div>  


        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:bg-accent-outline" type="submit">
                Potvrdit
            </button>
        </div>
    </form>
</div>
@endsection