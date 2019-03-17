


@extends('admin.master')

@section('title')
    Admin Panel || Add Blog
@endsection

@section('main')
    <div class="col_3">
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-thumbs-up icon-rounded"></i>
                <div class="stats">
                    <h5><strong>45%</strong></h5>
                    <span>New Orders</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-users user1 icon-rounded"></i>
                <div class="stats">
                    <h5><strong>1019</strong></h5>
                    <span>New Visitors</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-comment user2 icon-rounded"></i>
                <div class="stats">
                    <h5><strong>1012</strong></h5>
                    <span>New Users</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 widget">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-dollar dollar1 icon-rounded"></i>
                <div class="stats">
                    <h5><strong>$450</strong></h5>
                    <span>Profit Today</span>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Add Blog</h3>
                </div>
                <div class="panel-body">
                    <div class="container">

                        <form action="{{ route('update-blog') }}" method="post" name="editBlog" enctype="multipart/form-data" class="form-horizontal">

                            @csrf

                            <div class="form-group">
                                <label class="col-md-3" style="font-size: 18px; font-weight: bold">Category Name</label>
                                <div class="col-md-9">
                                    <select class="form-control1" name="category_id">
                                        <option> -- Select Category Name -- </option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3" style="font-size: 18px; font-weight: bold">Blog Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="blog_name" value="{{ $blog->blog_name }}" class="form-control1">
                                    <input type="hidden" name="id" value="{{ $blog->id }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3" style="font-size: 18px; font-weight: bold">Blog Short Description</label>
                                <div class="col-md-9">
                                    <textarea name="short_description" rows="5" cols="103">{{ $blog->short_description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3" style="font-size: 18px; font-weight: bold">Blog Long Description</label>
                                <div class="col-md-9">
                                    <textarea id="editor" name="long_description" rows="10" cols="103">{{ $blog->long_description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3" style="font-size: 18px; font-weight: bold">Blog Image</label>
                                <div class="col-md-9">
                                    <input type="file" name="blog_img" accept="image/*">
                                    <img src="{{ asset($blog ->blog_img) }}" alt="Image" height="120" width="150">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3" style="font-size: 18px; font-weight: bold">Publication Status</label>
                                <div class="col-md-9">
                                    <label><input type="radio" name="publication_status" {{ $blog->publication_status == 1 ? 'checked' : '' }} value="1"> Published</label>
                                    <label><input type="radio" name="publication_status" {{ $blog->publication_status == 0 ? 'checked' : '' }} value="0"> Unpublished</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    <input type="submit" name="btn" class="btn btn-info btn-lg btn-block" value="Update Blog Info">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.forms['editBlog'].elements['category_id'].value = '{{ $blog->category_id }}';
    </script>


@endsection