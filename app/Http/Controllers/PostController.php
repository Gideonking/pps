<?php

namespace App\Http\Controllers;


use App\Tag;
use Session;
use App\Post;
use App\Category;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.post.index')->with('post', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        $tags = Tag::all();

        if($categories->all() == 0 || $tags->count() ==0)
            {

                Session::flash('info','you must first create some categoris and tags before atempting to create a post.');

                return redirect()->back();
            }
        
        return view('admin.post.create')->with('categories', $categories)

                           ->with('tags', $tags);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request){
        
        $this->validate($request, [

            'title' => 'required',

            'featured' => 'required|image',
            
            'content'=> 'required',

            'category_id' => 'required',

           /* 'tag' => 'required'*/


            ]);

         // dd($request->all());


        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/posts', $featured_new_name);
        /*$slug=str_slug($request->get('title'));*/

        $post = Post::create([


            'title' => $request->title,
            'content' => $request->content,
            'featured' => 'uploads/posts/'. $featured_new_name,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title),
            /*'tag' => $request->tag*/

            ]);

        $post->tags()->attach($request->tags);

        Session:: flash( 'success', 'Post Created Successfully.');

        return redirect()->back();

    }

    /**
     * Display the specified resource.  
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('admin.post.edit')->with('post',$post)

        ->with('categories', Category::all())
        ->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'


            ]);

            $post = post::find($id);

            if($request->hasFile('featured'))
            {

            $featured = $request->featured;

            $featured_new_name = time() . $featured->getClientOriginalName();

            $featured->move('/uploads/posts', $featured_new_name);

            $post->featured = $featured_new_name;

            }

            $post->title = $request->title;
            $post->content = $request->content;
            $post->category_id =$request->category_id;
            $post->slug = $request->slug;
            $post->save();
        
            $post->tags()->sync($request->tags);

            Session::flash('Success', 'You have successfully Updated the Post.');

            return redirect()->route('posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'The post was just trashed.');

        return redirect()->back();
    }


    public function trashed(){

        $post = post::onlyTrashed()->get();

        return view('admin.post.trashed')->with('post',$post);

    }

    public function kashe($id){

        $post = post::withTrashed()->with('id', $id)->first();

        $post->forceDeletes();

        Session::flash('success', 'Post deleted Permanently.');

        return redirect()->back();
    }

    public function restore($id){

        $post = Post::withTrashed()->with('id', $id)->first();

        $post->restore();

        Session::flash('success', 'Post restore Successfully.');

        return redirect()->route('posts');
    }
}
