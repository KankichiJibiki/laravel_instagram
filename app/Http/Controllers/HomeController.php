<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;

class HomeController extends Controller
{
    private $post;
    private $user;
    private $like;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Post $post, User $user, Like $like)
    {
        // $this->middleware('auth');
        $this->post = $post;
        $this->user = $user;
        $this->like = $like;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('users.home')
        ->with('posts', $this->post->latest()->get())
        ->with('users', $this->user->all());
    }
}
