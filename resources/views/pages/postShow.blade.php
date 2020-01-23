@extends('layouts.base')

@section('content')

  <div class="category">
    <h1>{{ $post->category->name }}</h1>
    <p>{{ $post->category->description }}</p>
    <div class="posts">
      <div class="post ext">
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->body }}</p>
        <span>
          <a href="{{ route('post.edit', $post->id) }}">EDIT</a>
          <span class="hide"></span>
          <a href="{{ route('post.delete', $post->id) }}">DELETE</a>
        </span>
      </div>
    </div>
  </div>

@endsection