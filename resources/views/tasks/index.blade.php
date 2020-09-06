@extends('layouts.app')

@section('content')
<div class="container">
    @include('tasks.partions.task-form')
    <br>
     @include('tasks.partions.task-list')
</div>
@endsection