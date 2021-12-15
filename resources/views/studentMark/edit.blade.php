@extends('layouts.app')

@section('content')

    <h1>Student Update</h1>
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

    <form action="{{ route('studentMark.update', $studentMark->id) }}" method="post">
        @csrf
        @method('put')
        <div class="col-sm-12 mb-3">
            <select class="form-control" id="selectUser" name="student_id" required focus disabled>
                <option value="" disabled selected>Please select student</option>
                @foreach($students as $student)
                    <option value="{{$student->id}}"
                        {{$student->id == $studentMark->student_id  ? 'selected' : ''}}>{{ $student->name }}</option>
                @endforeach
            </select>
        </div>

        <input type="number" min="0" name="maths" class="form-control mb-3" placeholder="Enter maths mark" value="{{ $studentMark->maths }}" />

        <input type="number" min="0" name="science" class="form-control mb-3" placeholder="Enter science mark" value="{{ $studentMark->science }}" />

        <input type="number" min="0" name="history" class="form-control mb-3" placeholder="Enter history mark" value="{{ $studentMark->history }}" />

        <div class="col-sm-12 mb-3">
            <select class="form-control" id="selectUser" name="term_id" required focus>
                <option value="" disabled selected>Please select term</option>
                @foreach($terms as $term)
                    <option value="{{$term->id}}"
                        {{$term->id == $studentMark->term_id  ? 'selected' : ''}}>{{ $term->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary float-end px-5" type="submit">Submit</button>
    </form>

@endsection
