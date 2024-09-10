@extends('layouts.app2')

@section('content')
<br>
<br>



<table id="raceTable" class="table table-striped" style="width:65%">
    <thead>
        <tr>
        <th>ID</th>
            <th>Název</th>
            <th>Odkaz</th>
            <th>Země</th>
            <th>Typ</th>
           
        </tr>
    </thead>
    <tbody>
      
        @foreach($data as $race)
        <tr>
        <td>{{ $race->id }}</td>
 <td><a href="/races/{{ $race->id }}">{{ $race->default_name }}</a></td>
 <td><a href="{{ $race->link }}">{{ $race->link }}</a></td>

 <td><span class="fi fi-{{ $race->country }}"></span></td>
 <td>{{ $race->type }}</td>
</tr>
 @endforeach


    </tbody>
</table>

    <script>
new DataTable('#raceTable')

</script>
@endsection 