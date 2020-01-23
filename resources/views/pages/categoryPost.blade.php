@extends('layouts.base')

@section('content')

  <div class="category">
    <h1>{{ $category->name }}</h1>
    <p>{{ $category->description }}</p>
    <div class="posts">
      <div class="post ext">
        <form action="{{ route('category.post.create', $category->id) }}" method="post">
          @csrf
          @method('POST')
          <label for="title">TITLE:</label><br>
          <input type="text" name="title" value=""><br><br>
          <label for="body">BODY:</label><br>
          <input type="text" name="body" value=""><br><br>
          <input type="submit" name="submit" value="POST">
        </form>
      </div>
    </div>
  </div>

@endsection