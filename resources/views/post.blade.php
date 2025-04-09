@extends('layouts.app')

@section('content')
    @foreach($posts as $post)
        <h4>{{ $post->name }}</h4>
        <p>Author: {{ $post->user->name }}</p>
        <p>Tags: {{ $post->tags }}</p>
        <hr>
    @endforeach
@endsection
