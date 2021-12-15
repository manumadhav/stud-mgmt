@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <h2>Student Mark Details CRUD</h2>
            </div>
            <div class="col-xs-6">
                <a class="btn btn-success float-end" href="{{ route('studentMark.create') }}">Create Student Mark Details</a>
            </div>
        </div>
    </div>
    {{-- Display message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <table class="table table-striped table-hover">
        <thead>
        <tr></tr>
        <tr>
            <th scope="col">Student ID</th>
            <th scope="col">Student Name</th>
            <th scope="col">Maths</th>
            <th scope="col">Science</th>
            <th scope="col">History</th>
            <th scope="col">Term</th>
            <th scope="col">Total Mark</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($studentMarkDetails as $student) {{-- Loop students --}}
        <tr>
            <th scope="row">{{ $student->id }}</th>
            <th scope="row">{{ $student->studentData->name }}</th>
            <td>{{ $student->maths }}</td>
            <td>{{ $student->science }}</td>
            <td>{{ $student->history }}</td>
            <td>{{ $student->term }}</td>
            <td>{{ $student->total_mark }}</td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-danger btn-sm dropdown-toggle" type="button" id="actionDropdown"
                            data-mdb-toggle="dropdown" aria-expanded="false">
                        Action
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="actionDropdown">
                        <li><a class="dropdown-item" href="{{ route('studentMark.edit', $student->id) }}">Edit</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="{{ route('studentMark.destroy', $student->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="dropdown-item">Delete</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>

    {!! $studentMarkDetails->links() !!}

@endsection
