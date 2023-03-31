@extends('teams.layout')
@section('content')

<div class="card">
  <div class="card-header">Teams Page</div>
  <div class="card-body">

      <form method="POST" id="{{route('team.store')}}" action="{{ route('team.store') }}">
          @csrf
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Country</label></br>
        <input type="text" name="country" id="country" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
