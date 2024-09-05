@extends('layouts.app2')

@section('content')
<div class="flex justify-center items-center ">
<div class="relative flex flex-col mt-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96">
  <div class="mx-3 mb-0 border-b border-slate-200 pt-3 pb-2 px-1">
      <span class="text-slate-800 text-xl font-semibold">
          {{ $team->actual_name }}  [{{ $team->abbreviation }}]
      </span>
  </div>
  <div class="p-4">

      <p class="text-slate-700 leading-normal font-semibold">
       Rok: {{ $team->year }}</br>
       Dres: {{ $team->jersey }}
      </p>
  </div>
</div>
</div>

<div class="text-slate-800 text-xl font-semibold flex justify-center items-center mt-10">
 Cyklisti v týmu   
</div>

<table id="teamsTable" style="width:50%;">
            <thead>
                <tr class="bg-gray-200 border-b">
                    <th class="py-2 px-4 text-left">Jméno cyklisty</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr class="border-b">

                        <td class="py-2 px-4">{{ $item->first_name }} {{ $item->last_name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    <script>

new DataTable('#teamsTable')
</script>
@endsection