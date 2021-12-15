@extends('layouts.app')

@section('content')
    <h1>Student CRUD</h1>
    <a class="btn btn-link float-end" href="{{ route('students.create') }}">Create Student</a>

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
            <th scope="col">Age</th>
            <th scope="col">Gender</th>
            <th scope="col">Reporting Teacher</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($students as $student) {{-- Loop students --}}
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $student->name }}</td>
            <td>{{ $student->age }}</td>
            <td>{{ $student->gender }}</td>
            <td>{{ $student->reporting_teacher_id }}</td>
            <td>

                <div class="dropdown">
                    <button class="btn btn-danger btn-sm dropdown-toggle" type="button" id="actionDropdown"
                            data-mdb-toggle="dropdown" aria-expanded="false">
                        Action
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="actionDropdown">
                        <li><a class="dropdown-item" href="{{ route('students.show', $student->id) }}">View</a></li>
                        <li><a class="dropdown-item" href="{{ route('students.edit', $student->id) }}">Edit</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="{{ route('students.destroy', $student->id) }}" method="post">
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


@endsection
