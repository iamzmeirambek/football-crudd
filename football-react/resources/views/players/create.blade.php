@extends('teams.layout')
@section('content')

<div class="card">
  <div class="card-header">Player Page</div>
  <div class="card-body">

      <form action="{{ route('players.store') }}" method="post">
        @csrf
          <label>Name</label></br>
          <input type="text" name="name" id="name" class="form-control"></br>
          <label>Number</label></br>
          <input type="text" name="number" id="number" class="form-control"></br>
          <label>Cost</label></br>
          <input type="text" name="cost" id="cost" class="form-control"></br>
          <label for="number">Team:</label>
          <select name="team_id" id="team_id">
              <option>
                  Select Team
              </option>
              <?php
              $teams = \App\Models\Team::query()->get();
              foreach ($teams as $option) {
              ?>
{{--              <option><?php echo $option['id']; ?> </option>--}}
              <option><?php echo $option['id']." ".$option['name']; ?> </option>
              <?php
              }
              ?>
          </select>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
