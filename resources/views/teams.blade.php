@extends('layouts.app2')

@section('content')



<table id="teamsTable" class="table table-striped" style="width:65%">
    <thead>
        <tr>
            <th>Tým</th>
        </tr>
    </thead>
    <tbody>
      
        @foreach($data as $teams)
        <tr>
 <td><a href="/teams/{{$teams->id}}">{{ $teams->actual_name }}</td></a>
</tr>
 @endforeach


    </tbody>
</table>

    <script>

new DataTable('#teamsTable')
</script>
@endsection