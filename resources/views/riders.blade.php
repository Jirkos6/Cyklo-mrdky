@extends('layouts.app2')

@section('content')


<table id="riderTable" class="table table-striped" style="width:65%">
    <thead>
        <tr>
            <th>Jméno</th>
            <th>Tým</th>
            @auth
            <th>Delete</th>
            <th>Edit</th>
            @endauth
           
        </tr>
    </thead>
    <tbody>
      
        @foreach($data as $riders)
        <tr>
 <td><a href="/riders/{{ $riders->rider_id }}">>{{ $riders->first_name }} {{ $riders->last_name }}</a></td>
 <td>{{ $riders->name }}</td>
 @auth
 <td> <form id="deleteForm" method="POST" action="/delete/{{ $riders->rider_id }}">
    @csrf
    @method('DELETE')
    <button class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" type="submit" id="deleteButton">Smazat</button>
</form></td>
 <td><a href="/edit/{{ $riders->rider_id }}"><button class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Editovat</button></a></td>
@endauth
</tr>
 @endforeach


    </tbody>
</table>

    <script>

new DataTable('#riderTable')
</script>
@endsection