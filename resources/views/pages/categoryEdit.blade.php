@extends('layouts.base')

@section('content')
  
  <div class="category">
    <form action="{{ route('category.update', $category->id) }}" method="post">
      @csrf
      @method('POST')
      <label for="name">NAME:</label><br>
      <input type="text" name="name" value="{{ $category->name }}"><br><br>
      <label for="description">DESCRIPTION:</label><br>
      <input type="text" name="description" value="{{ $category->description }}"><br><br>
      <input type="submit" name="submit" value="UPDATE">
    </form>
  </div>

@endsection