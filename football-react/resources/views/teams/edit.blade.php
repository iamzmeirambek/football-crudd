@extends('teams.layout')
@section('content')

<div class="card">
  <div class="card-header">Teams Page</div>
  <div class="card-body">

      <form action="{{ route('team.update', $teams) }}" method="post">
        {!! csrf_field() !!}
        @method("PUT")
        <input type="hidden" name="id" id=" id" value="{{$teams->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$teams->name}}" class="form-control"></br>
        <label>Country</label></br>
        <input type="text" name="country" id="address" value="{{$teams->country}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
