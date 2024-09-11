@extends('layouts.app2')

@section('content')
<br>
<br>


<div class="flex justify-center items-center">
<h4 class="mt-10 block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
        Informace o etapě závodu</a>
      </h4>
      </div>
<table id="raceTable" class="table table-striped" style="width:65%">
    <thead>
        <tr>
            <th>Číslo Etapy</th>
            <th>Datum</th>
            <th>Poznámka</th>
            <th>Odjezd</th>
            <th>Příjezd</th>
            <th>Vzdálenost</th>
            <th>Vertikální metry</th>
            <th>Profil</th>
            <th>Link</th>
           
        </tr>
    </thead>
    <tbody>
      
        @foreach($data as $stage)
        <tr>
 <td>{{ $stage->number }}</td>
 <td>{{ $stage->date }}</td>
 <td>{{ $stage->note }}</td>
 <td>{{ $stage->departure }}</td>
 <td>{{ $stage->arrival }}</td>
 <td>{{ $stage->distance }}</td>
 <td>{{ $stage->vertical_meters }}</td>
 <td>{{ $stage->profile }}</td>
 <td><a href="{{ $stage->link }}">{{ $stage->link }}</td>
</tr>
 @endforeach


    </tbody>
</table>
<div class="flex justify-center items-center">
<h4 class="mt-10 block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
        Výsledky etapy závodu</a>
      </h4>
      </div>
      <table id="resultTable" class="table table-striped" style="width:65%">
    <thead>
        <tr>
            <th>Jméno</th>
            <th>Pozice</th>
            <th>Tým</th>
            <th>Čas</th>
            <th>Body</th>
            <th>Bonifikace</th>
            <th>Poznámka</th>
           
        </tr>
    </thead>
    <tbody>
      
        @foreach($riderResults as $item)
        <tr>
 <td><a href="{{ $item->name_link }}">{{ $item->first_name }} {{ $item->last_name }}</a></td>
 <td>{{ $item->rank }}</td>
 <td><a href="{{ $item->team_link }}">{{ $item->actual_name }}</a></td>
 <td>{{ $item->time }}</td>
 <td>{{ $item->point }}</td>
 <td>{{ $item->bonification }}</td>
 <td>{{ $item->note }}</td>
</tr>
 @endforeach


    </tbody>
</table>
    <script>
new DataTable('#raceTable')
new DataTable('#resultTable')
</script>
@endsection 