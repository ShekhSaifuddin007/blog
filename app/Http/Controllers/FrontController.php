<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index()
    {
        $blogs = Blog::published()->take('12')->get();

        return view('front.home.home', [
            'blogs'      => $blogs
        ]);
    }

    public function readMore($id)
    {

        $comments = Comment::orderBy('id', 'desc')->get();

        $blog = Blog::find($id);

        $categoryBlogs = Blog::where('category_id', $blog->category_id)->get();

        return view('front.read.read-more', [
            'blog'             => $blog,
            'categoryBlogs'    => $categoryBlogs,
            'comments'         => $comments
        ]);
    }

    public function categoryBlog($id)
    {
        $category = Category::find($id);

        $blogs = Blog::where([
                                'category_id'         => $id,
                                'publication_status'  => 1
                            ])->orderBy('id', 'desc')->get();

        return view('front.blog.category-blogs', [
            'category' => $category,
            'blogs'     => $blogs
        ]);
    }


    public function about()
    {
        return view('front.about.about');
    }

    public function contact()
    {
        return view('front.contact.contact');
    }
}
