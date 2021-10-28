@extends('admin/layout')
@section('content')
    <form action="{{route('types.update',$record->id)}}" method="post">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="form-group">
            <label>Create City:</label>

            <div class="input-group date" id="timepicker" data-target-input="nearest">
                <input type="text" value="{{$record->name}}" name="name" for="name" class="form-control datetimepicker-input" data-target="#timepicker"/>

            </div>
            <!-- /.input group -->
        </div>
        <div>
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
@endsection
