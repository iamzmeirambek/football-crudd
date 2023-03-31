@extends('teams.layout')
@section('content')

<div class="card">
  <div class="card-header">Player Page</div>
  <div class="card-body">

      <form action="{{ route('players.update' , $players) }}" method="post">
        {!! csrf_field() !!}
        @method("PUT")
        <input type="hidden" name="id" id=" id" value="{{$players->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$players->name}}" class="form-control"></br>
        <label>Number</label></br>
        <input type="text" name="number" id="number" value="{{$players->number}}" class="form-control"></br>
          <label>Cost</label></br>
          <input type="text" name="cost" id="cost" value="{{$players->cost}}" class="form-control"></br>
          <select name="team_id" id="team_id">
              <option>
                  Select Team
              </option>
              <?php
              $teams = \App\Models\Team::query()->get();
              foreach ($teams as $option) {
              ?>
              <option><?php echo $option['id']." ".$option['name']; ?> </option>
              <?php
              }
              ?>
          </select>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
