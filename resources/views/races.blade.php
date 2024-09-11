@extends('layouts.app2')

@section('content')
<br>
<br>



<table id="raceTable" class="table table-striped" style="width:65%">
    <thead>
        <tr>
            <th>Název</th>
            <th>Rok</th>
            <th>Doba konání</th>
            <th>Sex</th>
            <th>Kategorie</th>
            <th>Země</th>
           
        </tr>
    </thead>
    <tbody>
      
        @foreach($data as $race)
        <tr>
 <td><a href="/stages/{{ $race->id }}">{{ $race->real_name }}</a></td>
 <td>{{ $race->year }}</td>
 <td>{{ $race->start_date }} - {{ $race->end_date }}</td>
 <td>{{ $race->sex }}</td>
 <td>{{ $race->category }}</td>
 <td><span class="fi fi-{{ $race->country }}"></span></td>
</tr>
 @endforeach


    </tbody>
</table>

    <script>
new DataTable('#raceTable')

</script>
@endsection 