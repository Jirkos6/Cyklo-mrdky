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
    @auth
    <div class="flex flex-col items-center mt-12">
    <h1 class="text-3xl font-bold mb-6">Vyberte cyklisty pro Editaci</h1>
        <div class="mb-6">
            <label for="mySelect" class="block text-gray-700 text-sm font-bold mb-2">Cyklisté:</label>
            <select id="mySelect" name="riders[]" class="js-example-basic-multiple block w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500" multiple="multiple">
                @foreach($data as $item)
                    <option value="{{ $item->rider_id }}">{{ $item->first_name }} {{ $item->last_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex justify-center">
            <button type="submit" id="MultieditButton" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Editovat
            </button>
        </div>
    </form>
</div>
@endauth


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
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
new DataTable('#riderTable')
var mySelect = document.querySelector('.js-example-basic-multiple'); 
var multieditbutton = document.getElementById('MultieditButton');
multieditbutton.addEventListener('click', function() {
    var selectedIds = Array.from(mySelect.selectedOptions).map(option => option.value); 
    console.log(selectedIds);
    if (selectedIds.length > 0) {
        window.location.href = '/rider/multi-edit?id=' + selectedIds.join(',');
    } else {
        console.log('Nebylo vybráno nic na editaci.'); 
    }
});
</script>
@endsection