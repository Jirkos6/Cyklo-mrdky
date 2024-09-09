@extends('layouts.app2')

@section('content')
<div class="flex justify-center items-center ">
<div class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white disabled">
    <a href="" aria-current="true" class="block w-full px-4 py-2 text-white bg-blue-700 border-b border-gray-200 rounded-t-lg cursor-pointer dark:bg-gray-800 dark:border-gray-600">
        Roky
    </a>
    @foreach ($team->teamYears as $item) 
    <a href="#teamsTable_{{ $item->id }}" class="block w-full text-black px-4 py-2 border-b border-gray-200 cursor-pointer hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
        {{ $item->year }}
    </a>
    @endforeach

</div>
</div>
@if($team)
    @foreach ($team->teamYears as $teamYear)
        <div class="flex justify-center items-center ">
            <div class="relative flex flex-col mt-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96">
                <div class="mx-3 mb-0 border-b border-slate-200 pt-3 pb-2 px-1">
                    <span class="text-slate-800 text-xl font-semibold">
                        <a href="{{ $teamYear->link }}">{{ $team->actual_name }}  [{{ $teamYear->abbreviation }}]</a>
                    </span>
                </div>
                <div class="p-4">
                    <p class="text-slate-700 leading-normal font-semibold">
                        Rok: {{ $teamYear->year }}<br>
                        Dres: {{ $teamYear->jersey }}
                    </p>
                </div>
            </div>
        </div>

        <div class="text-slate-800 text-xl font-semibold flex justify-center items-center mt-10">
            Cyklisti v týmu   
        </div>

        <table id="teamsTable_{{ $teamYear->id }}" style="width:50%;">
            <thead>
                <tr class="bg-gray-200 border-b">
                    <th class="py-2 px-4 text-left">Jméno cyklisty</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teamYear->riders as $rider)
                    <tr class="border-b">
                        <td class="py-2 px-4">
                            <a href="/riders/{{ $rider->id }}">{{ $rider->first_name }} {{ $rider->last_name }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <script>
            new DataTable('#teamsTable_{{ $teamYear->id }}');
        </script>
    @endforeach
@endif
@endsection
