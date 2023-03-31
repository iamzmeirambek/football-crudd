@extends('teams.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Teams Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Name : {{ $teams->name }}</h5>
        <p class="card-text">Country : {{ $teams->country }}</p>
  </div>
       
    </hr>
  
  </div>
</div>