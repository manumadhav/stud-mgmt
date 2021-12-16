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

    <form action="{{ route('students.update', $student->id) }}" method="post">
        @csrf
        @method('put')
        <input type="text" name="name" class="form-control mb-3" placeholder="Student Name"
               value="{{ $student->name }}"/>

        <input type="number" name="age" class="form-control mb-3" placeholder="Age" value="{{ $student->age }}"/>

        <select class="form-control mb-3" name="gender" placeholder="Gender">
            <option value="M" {{ old('name',$student->gender)=='M' ? 'selected' : ''  }}>M</option>
            <option value="F" {{ old('name',$student->gender)=='F' ? 'selected' : ''  }}>F</option>
        </select>

        <div class="col-sm-12 mb-3">
            <select class="form-control" id="selectUser" name="reporting_teacher_id" required focus>
                <option value="" disabled selected>Please select reporting teacher</option>
                @foreach($teachers as $teacher)
                    <option value="{{$teacher->id}}"
                        {{$teacher->id == $student->reporting_teacher_id  ? 'selected' : ''}}>{{ $teacher->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary float-end px-5" type="submit">Submit</button>
    </form>

@endsection
