@extends('admin/layout')
@section('content')
    <form action="{{route('cities.store')}}" method="post">
        @csrf
    <div class="form-group">
        <label>Create City:</label>

        <div class="input-group date" id="timepicker" data-target-input="nearest">
            <input type="text" name="name" for="name" class="form-control datetimepicker-input" data-target="#timepicker"/>

        </div>
        <!-- /.input group -->
    </div>
        <div>
            <button type="submit" class="btn btn-success">Create</button>
        </div>
    </form>
@endsection
