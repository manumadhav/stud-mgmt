@extends('layouts.app')

@section('content')

    <h1>Create Student Mark Details</h1>
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

    <form action="{{ route('studentMark.store') }}" method="post">
        @csrf
        <div class="col-sm-12 mb-3">
            <select class="form-control" id="selectUser" name="student_id" required focus>
                <option value="" disabled selected>Please select student</option>
                @foreach($students as $student)
                    <option value="{{$student->id}}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>

        <input type="number" name="maths" class="form-control mb-3" placeholder="Enter maths mark"/>

        <input type="number" name="science" class="form-control mb-3" placeholder="Enter science mark"/>

        <input type="number" name="history" class="form-control mb-3" placeholder="Enter history mark"/>

        <div class="col-sm-12 mb-3">
            <select class="form-control" id="selectUser" name="term_id" required focus>
                <option value="" disabled selected>Please select term</option>
                @foreach($terms as $term)
                    <option value="{{$term->id}}">{{ $term->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary float-end px-5" type="submit">Submit</button>
    </form>

@endsection
