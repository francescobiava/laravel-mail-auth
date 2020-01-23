@extends('layouts.base')

@section('content')

  @foreach ($categories as $category)
  
    <div class="category">
      <h1>{{ $category->name }}</h1>
      <p>{{ $category->description }}</p>
      <span>
        <a href="{{ route('category.edit', $category->id) }}">EDIT</a>
        <span class="hide"></span>
        <a href="{{ route('category.delete', $category->id) }}">DELETE</a>
        <span class="hide"></span>
        <a href="{{ route('category.post', $category->id) }}">POST</a>
      </span>
      <div class="posts">
        @foreach ($category->posts as $post)
          <div class="post">
            <a href="{{ route('post.show', $post->id) }}">
              <h3>{{ $post->title }}</h3>
            </a>
          </div>
        @endforeach
      </div>
    </div>

  @endforeach

@endsection