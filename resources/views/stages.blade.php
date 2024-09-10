@extends('layouts.app2')

@section('content')
<br>
<br>



<table id="raceTable" class="table table-striped" style="width:65%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Číslo</th>
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
 <td><a href="/results/{{ $stage->id }}">{{ $stage->number }}</a></td>
 <td>{{ $stage->date }}</td>
 <td>{{ $stage->note }}</td>
 <td>{{ $stage->departure }}</td>
 <td>{{ $stage->arrival }}</td>
 <td>{{ $stage->vertical_meters }}</td>
 <td>{{ $stage->profile }}</td>
 <td><a href="{{ $stage->link }}">{{ $stage->link }}</td>
</tr>
 @endforeach


    </tbody>
</table>

    <script>
new DataTable('#raceTable')

</script>
@endsection 