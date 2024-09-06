@extends('layouts.app2')
@section('content')
<div class="m-4">
    <iframe src="rider-pdf" class="w-full h-full border-gray-300 border rounded shadow">
    </iframe>
    <a href="rider-pdf" class="btn btn-primary mt-2" download>Stáhnout data cyklistů</a>
</div>
@endsection