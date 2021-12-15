@extends('layouts.app')

@section('content')

    <h1>Student Create</h1>
    <hr/>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="post">
        @csrf
        <input type="text" name="name" class="form-control mb-3" placeholder="Student Name"/>

        <input type="number" name="age" class="form-control mb-3" placeholder="Age"/>

        <input type="number" name="gender" class="form-control mb-3" placeholder="Gender"/>

        <div class="col-sm-12 mb-3">
            <select class="form-control" id="selectUser" name="teacher_selected" required focus>
                <option value="" disabled selected>Please select reporting teacher</option>
                @foreach($teachers as $teacher)
                    <option value="{{$teacher->id}}">{{ $teacher->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary float-end px-5" type="submit">Submit</button>
    </form>

@endsection
