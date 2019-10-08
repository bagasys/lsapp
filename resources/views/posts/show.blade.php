@extends('layouts.app')
@section('content')
<h1>
  {{$post->title}}
</h1>
<div>
  {!!$post->body!!}
</div>
<small>Written on {{$post->created_at}}. By {{$post->user->name}}</small>
<hr>
@if (!Auth::guest() && Auth::user()->id == $post->user_id)
    
<a href="/posts/{{$post->id}}/edit" class="btn btn-secondary">Edit</a>
{!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
{{Form::hidden('_method', 'DELETE')}}
{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
@endif
@endsection