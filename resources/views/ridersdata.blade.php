@extends('layouts.app2')

@section('content')



<div class="flex justify-center items-center ">
  <div class="flex bg-clip-border rounded-xl bg-white text-gray-700 shadow-md w-full max-w-[48rem] flex-row ">
    <div
      class="relative w-2/5 m-0 overflow-hidden text-gray-700 bg-white rounded-r-none bg-clip-border rounded-xl shrink-0">
      <img
        src="{{ asset('obrazky/' . $data->photo) }}"
        alt="card-image" class="object-cover w-full h-full" />
    </div>
    <div class="p-6">
      <h6
        class="block mb-4 font-sans text-base antialiased font-semibold leading-relaxed tracking-normal text-gray-700 uppercase">
        {{ $data->first_name }} {{ $data->last_name }}
      </h6>
      <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
        Tým: <a href="/teams/{{$data->team_team_id}}">{{ $data->name }}</a>
      </h4>
      <p class="block mb-8 font-sans text-base antialiased font-semibold leading-relaxed text-gray-700">
      Datum narození: {{ $data->date_of_birth }} <br>
      Místo narození: {{ $data->place_of_birth }} <br>
      Váha: {{ $data->weight }} kg<br>
      Výška: {{ $data->height }} cm<br>
      </p>
      <a href="/riders" class="inline-block"><button
          class="flex items-center gap-2 px-6 py-3 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none hover:bg-gray-900/10 active:bg-gray-900/20"
          type="button">
          Vrátit zpět<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"></path>
          </svg></button></a>
    </div>
  </div>
</div>






@endsection