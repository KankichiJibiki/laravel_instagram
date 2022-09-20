<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    private $post;
    private $user;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        // $this->middleware('auth');
        $this->post = $post;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('users.home')->with('posts', $this->post->latest()->get());
    }
}
