<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Follower;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    const LOCAL_STORAGE = 'public/images/';
    public $user;
    public $follower;

    public function __construct(User $user, Post $post, Category $category, Follower $follower)
    {
        $this->user = $user;
        $this->post = $post;
        $this->category = $category;
        $this->follower = $follower;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::where('user_id', '=', Auth::id())->latest()->get();
        $followers = $this->follower->all();

        return view('users.profile')
        ->with('posts', $posts)
        ->with('followers', $followers)
        ->with('users', $this->user->latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userWithTrashed = $this->user->withTrashed()->get();
        return view('users.admin.user')
            ->with('users', $userWithTrashed)
            ->with('posts', $this->post->latest()->get())
            ->with('categories', $this->category->latest()->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('users.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function saveAvatar($avatar){
        $avatar_name = time() . "." . $avatar->extension();
        $avatar->storeAs(self::LOCAL_STORAGE, $avatar_name);
        return $avatar_name;
    }

    public function update(Request $request, $id)
    {
        $user = $this->user->findOrFail($id);

        if($request->avatar) {
            $avatar = ["avatar"=>$this->saveAvatar($request->avatar)];
            $user->fill(array_merge($request->all(), $avatar))->save();
        } else $user->fill($request->all())->save();
        
        return redirect()->route('profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = $this->user->findOrFail($id);
        $user->delete();
        return redirect()->back();
    }

    public function activate($id){
        $user = $this->user->withTrashed()->findOrFail($id);
        $user->restore();

        return redirect()->back();
    }
}
