@extends('layouts.app')

@section('content')
<div class="container">
    @include('tasks.partions.task-form')
    <br>
    @if(Session::has('data'))
   <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" arial-label="Close"><span aria-      hidden="true">x</span></button>
         {{ Session::get('data') }}	
    </div>
    @endif
     @include('tasks.partions.task-list')
</div>
@endsection