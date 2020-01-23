@extends('layouts.base')

@section('content')

  <div class="category">
    <h1>{{ $post->category->name }}</h1>
    <p>{{ $post->category->description }}</p>
    <div class="posts">
      <div class="post ext">
        <form action="{{ route('post.update', $post->id) }}" method="post">
          @csrf
          @method('POST')
          <label for="title">TITLE:</label><br>
          <input type="text" name="title" value="{{ $post->title }}"><br><br>
          <label for="body">BODY:</label><br>
          <input type="text" name="body" value="{{ $post->body }}"><br><br>
          <input type="submit" name="submit" value="UPDATE">
        </form>
      </div>
    </div>
  </div>

@endsection