@extends('admin/layout')
@section('content')
    <br>
    <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Meal:-{{$record->meal->name}}</li>
            <li class="list-group-item">Restaurant:-{{$record->restaurant->name}}</li>
            <li class="list-group-item">Date from:-{{$record->date_from}}</li>
            <li class="list-group-item">Date To:-{{$record->date_to}}</li>
            <li class="list-group-item">details:-{{$record->text}}</li>



        </ul>
    </div>
@endsection
