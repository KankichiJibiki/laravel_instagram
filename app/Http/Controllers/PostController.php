<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    const LOCAL_STORAGE = 'public/images/';
    private $post;
    private $category;

    public function __construct(Post $post, Category $category)
    {
        $this->post = $post;
        $this->category = $category;
    }

    public function rules(){
        return [
            'image'=>['required', 'image', 'max:2084'],
            'description'=>['required', 'max:500'],
            'categories'=>['required']
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view("users.post.create")
            ->with('categories', $this->category->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveImage($image){
        $image_name = time() . "." . $image->extension();
        $image->storeAs(self::LOCAL_STORAGE, $image_name);

        // $request->image->store();
        return $image_name;
    }

    public function store(Request $request)
    {
        $request->validate($this->rules());

        $this->post->user_id = Auth::id();
        $this->post->description = $request->description;
        $this->post->image = $this->saveImage($request->image);
        $this->post->save();

        foreach($request->categories as $category_id):
            $category_post[] = ["category_id"=>$category_id];
        endforeach;

        $this->post->post_categories()->createMany($category_post);
        
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('users.post.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('users.post.edit')
            ->with('post', $post)
            ->with('categories', $this->category->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate($this->rules());

        if($request->has('image')){
            $post->image = $this->saveImage($request->image);
        }
        $post->description = $request->description;
        $post->save();

        // return $request->categories;
        foreach($request->categories as $category_id) {
            $updated_post_categories[] = ["category_id"=>$category_id];
        }

        $post->post_categories()->delete();
        $post->post_categories()->createMany($updated_post_categories);

        return redirect()->route('post.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('index');
    }

    public function hideBlock($id){
        $post = $this->post->findOrFail($id);
        $post->delete();
        return redirect()->back();
    }

    public function unhide($id){
        $post = $this->post->withTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->back();
    }

    public function showPostAdmin(){
        return view('users.admin.post')->with('posts', $this->post->withTrashed()->paginate(5));
    }
}
