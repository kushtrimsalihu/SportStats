<?php

namespace App\Domains\Auth\Http\Controllers\Backend\Posts;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Domains\Auth\Http\Requests\Backend\Posts\PostsRequest;
use App\Domains\Auth\Models\Posts;
use App\Domains\Auth\Models\Tag;
use Illuminate\Support\Facades\DB;
use App\Domains\Auth\Services\PermissionService;

class PostsController
{
    public function index()
    {
        $posts = Posts::paginate(9);
        return view('backend.auth.posts.index',[
            'posts' => $posts
        ]);
    }

    public function create()
    {
         return view('backend.auth.posts.create');
    }

    public function store(PostsRequest $request)
    {
        $posts = new Posts;
        $posts ->title=$request->input('title');
        $posts ->content = $request->input('content');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('postuploads/PostsImages', $filename);
            $posts->image = $filename;
        }
        $posts ->save();
        $postid = $posts->id;
        if ($request->input('tags') !== null) {
            $tags = explode(',',$request->input('tags'));
            foreach ($tags as $tag) {
                if ($this->TagExists($tag)) {
                    $this->PostTags($postid, $tag);
                }
                else {
                    if ($this->TagCreate($tag)) {
                        $this->PostTags($postid, $tag);
                    }
                }
            }
        }
        return redirect()->route('admin.auth.posts.index')->withFlashSuccess(__('The Post was created successfully .'));
    }

    public function edit($id)
    {
        $posts = Posts::find($id);
        return view('backend.auth.posts.edit')->with([
            'posts' => $posts
        ]);
    }

    public function update(PostsRequest $request, $id)
    {
        $posts = Posts::find($id);
        $posts->title = $request ->input('title');
        $posts ->content = $request->input('content');

        if($request->hasfile('image')){

            $destination = 'postuploads/PostsImages'.$posts->image;
            if(File::exists($destination)){
             File::delete($destination);
            }
            $file= $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.'.$extension;
            $file->move('postuploads/PostsImages',$filename);
            $posts->image = $filename;
        }

        $posts ->update();

        $postid = $posts->id;
        if ($request->input('tags') !== null) {
            $tags = explode(',',$request->input('tags'));
            foreach ($tags as $tag) {
                if ($this->TagExists($tag)) {
                    if (!$this->PostHasTag($postid, $tag)) {
                        $this->PostTags($postid, $tag);
                    }
                }
                else {
                    if ($this->TagCreate($tag)) {
                        $this->PostTags($postid, $tag);
                    }
                }
            }
        }
        return redirect()->route('admin.auth.posts.index')->withFlashSuccess(__('Posts Updated'));
    }

    public function show($id)
    {
        $post = Posts::find($id);
        if ($post) {
            return view('backend.auth.posts.show')->with([
                'post' => $post
            ]);
        }
        return redirect()->route('admin.auth.posts.index')->withFlashDanger('Failed to find post');
    }

    public function destroy($id)
    {
        $posts = DB::table('posts')->where('id', $id)->delete();
        if($posts){
            return redirect()->route('admin.auth.posts.index')->withFlashSuccess('Post Removed');
        }
        return redirect('/backend.auth.posts.index')->withFlashDanger('Fail');
    }

    public function TagExists($tagname)
    {
        $tagexists = Tag::where('name', $tagname)->get();
        if (count($tagexists) > 0) {
            return true;
        }
        return false;
    }

    public function TagCreate($tagname)
    {
        DB::table('tag')->insert([
            'name' => $tagname
        ]);
        return true;
    }

    public function PostTags($post_id, $tagname)
    {
        $tag_id = Tag::where('name', $tagname)->first()->id;
        DB::table('posttag')->insert([
            'post_id' => $post_id,
            'tag_id' => $tag_id
        ]);
        return true;
    }

    public function PostHasTag($post_id, $tagname)
    {
        $tag_id = Tag::where('tag.name', '=', $tagname)->first()->id;

        $posttag = DB::table('posttag')
                            ->where('posttag.post_id', '=', $post_id)
                            ->where('posttag.tag_id', '=', $tag_id)
                            ->get();
        if (count($posttag) > 0) {
            return true;
        }
        return false;
    }
}
