@extends('teams.layout')
@section('content')


<div class="card">
  <div class="card-header">Player Page</div>
  <div class="card-body">


        <div class="card-body">
            <h5 class="card-title">Name : {{ $player->name }}</h5>
            <p class="card-text">Number : {{ $player->number  }}</p>
            <p class="card-text">Cost : {{ $player->cost }}</p>
        </div>

    </hr>

  </div>
</div>
