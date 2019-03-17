<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddBlogController extends Controller
{
    public function blog()
    {
        $categories = Category::where('publication_status', 1)->get();

        return view('admin.blog.add-blog', [
            'categories' => $categories
        ]);
    }

    public function newBlog(Request $request)
    {
        $this->validate($request, [
            'blog_name'             => 'required | min:10 | max:25',
            'short_description'     => 'required | min:25 | max:45',
            'long_description'      => 'required | min:150',
            'blog_img'              => 'required | image',
            'publication_status'    => 'required'
        ]);

        $existBloName = Blog::where('blog_name', $request->blog_name)->first();

        if ($existBloName) {
            return redirect()->back()->with('warnMessage', 'This Name Already Exist, Please Give Another One Thank You..');
        } else {
            $image      = $request->file('blog_img');
            $imageName  = $image->getClientOriginalName();
            $directory  = './blog-images/';
            $image->move($directory, $imageName);

            $blog = new Blog();
            $blog->category_id          = $request->category_id;
            $blog->blog_name            = $request->blog_name;
            $blog->short_description    = $request->short_description;
            $blog->long_description     = $request->long_description;
            $blog->blog_img             = $directory.$imageName;
            $blog->publication_status   = $request->publication_status;
            $blog->save();

            return redirect('/blog/add-blog')->with('message', 'Blog Data Add Successfully.......');
        }

    }

    public function manageBlog()
    {
//        $blogs = Blog::orderBy('id', 'desc')->get();

        $blogs = Blog::orderBy('id', 'desc')->get();
//        return $blogs;


        return view('admin.blog.manage-blog', [
            'blogs' => $blogs
        ]);
    }

    public function viewBlog($id)
    {
        $blog = Blog::find($id);

        return view('admin.blog.view-blog', [
            'blog' => $blog
        ]);
    }

    public function editBlog($id)
    {
        $blog = Blog::find($id);
        $categories = Category::where('publication_status', 1)->get();

        return view('admin.blog.edit-blog', [
            'blog'          => $blog,
            'categories'    => $categories
        ]);
    }

    public function updateBlog(Request $request)
    {

        $blog   = Blog::find($request->id);
        $image  = $request->file('blog_img');

        if ($image)
        {
            if (file_exists($blog->blog_img))
            {
                unlink($blog->blog_img); // for remove existing image with new image.
            }

            // if client want to update with new image, this function will run.
            $imageName  = $image->getClientOriginalName();
            $directory  = './blog-images/';
            $image->move($directory, $imageName);
            $imageUrl   = $directory.$imageName;
        }
        else
        {
            // if client don't want to update with new image, this function will run.
            $imageUrl   = $blog->blog_img;
        }

        $blog->category_id          = $request->category_id;
        $blog->blog_name            = $request->blog_name;
        $blog->short_description    = $request->short_description;
        $blog->long_description     = $request->long_description;
        $blog->blog_img             = $imageUrl;
        $blog->publication_status   = $request->publication_status;
        $blog->save();


        return redirect('/blog/manage-blog')->with('message', 'Blog Update Successfully.......');


//        if($image != $request->blog_img)
//        {
//            $imageName  = $image->getClientOriginalName();
//            $directory  = './blog-images/';
//            $image->move($directory, $imageName);
//
//            $blog->category_id          = $request->category_id;
//            $blog->blog_name            = $request->blog_name;
//            $blog->short_description    = $request->short_description;
//            $blog->long_description     = $request->long_description;
//            $blog->blog_img             = $directory.$imageName;
//            $blog->publication_status   = $request->publication_status;
//            $blog->save();
//
//            return redirect('/blog/manage-blog')->with('message', 'Blog Update Successfully.......');
//        }
//        else
//        {
//            $blog->category_id          = $request->category_id;
//            $blog->blog_name            = $request->blog_name;
//            $blog->short_description    = $request->short_description;
//            $blog->long_description     = $request->long_description;
//            $blog->publication_status   = $request->publication_status;
//            $blog->save();
//
//            return redirect('/blog/manage-blog')->with('message', 'Blog Update Successfully.......');
//        }

    }

    public function deleteBlog($id)
    {
        $blog = Blog::find($id);
        unlink($blog->blog_img);
        $blog->delete();

        return redirect('/blog/manage-blog')->with('message', 'Blog Delete Successfully.......');
    }

}
