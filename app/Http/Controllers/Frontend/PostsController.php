<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\DB;
use App\Domains\Auth\Models\Posts;

/**
 * Class HomeController.
 */
class PostsController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $PostsList = Posts::paginate(9);
        // $PostsList = DB::table('posts')
        // ->select('posts.*')
        // ->get();
        return view('frontend.blog.posts',[
            'posts' => $PostsList
        ]);
        // return view('frontend.blog.posts');
    }
    public function show($id)
    {
        $post = DB::table('posts')
            ->select('posts.*')
            ->where('id', '=', $id)->first();
        if ($post) {
            return view('frontend.blog.show',[
                'post' => $post
            ]);
        }
        return redirect()->route('frontend.blog.posts')->withFlashDanger(__('Something went wrong.'));
    }
}
