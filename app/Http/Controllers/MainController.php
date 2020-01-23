<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests\CategoryRequest;
use App\Category;
use App\Post;
use Illuminate\Support\Facades\Mail;
use App\Mail\DBActionDelete;
use App\Mail\DBActionCreate;

class MainController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('pages.index', compact('categories'));
    }

    public function postShow($id) {
        $post = Post::findOrFail($id);
        return view('pages.postShow', compact('post'));
    }

    public function postEdit($id) {
        $post = Post::findOrFail($id);
        return view('pages.postEdit', compact('post'));
    }

    public function postUpdate(PostRequest $request, $id) {
        $validatedData = $request -> validated();
        $post = Post::findOrFail($id);
        $post -> update($validatedData);
        return redirect() -> route('post.show', $id);
    }

    public function postDelete($id) {
        $post = Post::findOrFail($id);
        $post -> delete();
        Mail::to('test@email.com') -> send(new DBActionDelete('Post', $post->title));
        return redirect() -> route('index');
    }

    public function categoryEdit($id) {
        $category = Category::findOrFail($id);
        return view('pages.categoryEdit', compact('category'));
    }

    public function categoryUpdate(CategoryRequest $request, $id) {
        $validatedData = $request -> validated();
        $category = Category::findOrFail($id);
        $category -> update($validatedData);
        return redirect() -> route('index');
    }

    public function categoryDelete($id) {
        $category = Category::findOrFail($id);
        $category -> posts() -> delete();
        $category -> delete();
        Mail::to('test@email.com') -> send(new DBActionDelete('Category', $category->name));
        return redirect() -> route('index');
    }

    public function categoryPost($id) {
        $category = Category::findOrFail($id);
        return view('pages.categoryPost', compact('category'));
    }

    public function categoryPostCreate(PostRequest $request, $id) {
        $validatedData = $request -> validated();
        $post = Post::make($validatedData);
        $category = category::findOrFail($id);
        $post -> category() -> associate($category);
        $post -> save();
        Mail::to('test@email.com') -> send(new DBActionCreate('Post', $post->title));
        return redirect() -> route('index');
    }
}
