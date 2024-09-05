@extends('layouts.app2')

@section('content')



<table id="riderTable" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Jméno</th>
            <th>Tým</th>
        </tr>
    </thead>
    <tbody>
      
        @foreach($data as $riders)
        <tr>
 <td><a href="/riders/{{ $riders->rider_id }}">>{{ $riders->first_name }} {{ $riders->last_name }}</a></td>
 <td>{{ $riders->name }}</td>
</tr>
 @endforeach


    </tbody>
</table>

    <script>
new DataTable('#riderTable')
</script>
@endsection