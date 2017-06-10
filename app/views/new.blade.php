@extends('layouts.main')

@section('content')

    <h1> Create New Task</h1>

     @foreach ($errors->all() as $error)
        <p class="error">{{ $error}}</p>
    @endforeach 

    {{ Form::open()  }}
    <input type="text" name="content" palceholder="name task"/>
    <input type="submit" value="Create" />
    {{ Form::clos() }}

@stop
