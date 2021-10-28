@extends('admin/layout')
@section('content')
    <form action="{{route('areas.update',$record->id)}}" method="post">
        @csrf
        {{method_field('PATCH')}}
        <div class="form-group">
            <label>Update Area:</label>
            <div class="form-group">
                <label>City</label>
                <select name="city_id" for="city_id" class="form-control">
                    <option disabled selected>City</option>
                    @foreach($cities as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group date" id="timepicker" data-target-input="nearest">
                <input type="text" name="name" value="{{$record->name}}" for="name" class="form-control datetimepicker-input" data-target="#timepicker"/>

            </div>
            <!-- /.input group -->
        </div>
        <div>
            <button type="submit" class="btn btn-success">Create</button>
        </div>
    </form>
@endsection
