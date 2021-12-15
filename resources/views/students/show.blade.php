@extends('layouts.app')

@section('content')
    <h1>Students Details</h1>
    <hr/>

    <div class="bg-dark text-white rounded p-3">
        <h5 class="text-warning">Name</h5>
        <p class="fw-bold">{{ $student->name }}</p>

        <h5 class="text-warning">Age</h5>
        <p class="fw-bold">{{ $student->age }}</p>

        <h5 class="text-warning">Gender</h5>
        <p class="fw-bold">{{ $student->gender }}</p>

        <h5 class="text-warning">Reporting Teacher</h5>
        <p class="fw-bold">{{ $student->teacher->name }}</p>
    </div>

@endsection
