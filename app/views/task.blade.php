@extends('layouts.main')

@section('content')

    <h1>Vostaches <small>( <a href="{{ URL::Route('new')  }}"> New task </a>)</small></h1> 
    <ul>
       @foreach ($items as $item)
           
           <li>
            {{ Form::open()}}
                <input type="checkbox" name="id" onClick="this.form.submit()" {{ $item->done ? 'checked' : ' ' }}/>
                <input type="hidden" name="id" value="{{ $item->id}}" />
                {{$item->content}} <small> (<a href="{{ URL::route('delete', $item->id) }} ">x</a>) </small>    
            {{Form::close()}}
           </li>
       @endforeach
    </ul>
@stop

