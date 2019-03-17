
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

                        <h2 style="color: green">{{ Session::get('message') }}</h2>
                        <h2 style="color: red">{{ Session::get('warnMessage') }}</h2>

                        <form action="{{ route('new-blog') }}" method="post" enctype="multipart/form-data" class="form-horizontal">

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
                                    <input type="text" name="blog_name" class="form-control1">
                                    <small class="text-danger">{{ $errors->has('blog_name') ? $errors->first('blog_name') : ' ' }}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3" style="font-size: 18px; font-weight: bold">Blog Short Description</label>
                                <div class="col-md-9">
                                    <textarea name="short_description" rows="5" cols="103"></textarea>
                                    <small class="text-danger">{{ $errors->has('short_description') ? $errors->first('short_description') : ' ' }}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3" style="font-size: 18px; font-weight: bold">Blog Long Description</label>
                                <div class="col-md-9">
                                    <textarea id="editor" name="long_description"></textarea>
                                    <small class="text-danger">{{ $errors->has('long_description') ? $errors->first('long_description') : ' ' }}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3" style="font-size: 18px; font-weight: bold">Blog Image</label>
                                <div class="col-md-9">
                                    <input type="file" name="blog_img" accept="image/*">
                                    <small class="text-danger">{{ $errors->has('blog_img') ? $errors->first('blog_img') : ' ' }}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3" style="font-size: 18px; font-weight: bold">Publication Status</label>
                                <div class="col-md-9">
                                    <label><input type="radio" name="publication_status" value="1"> Published</label>
                                    <label><input type="radio" name="publication_status" value="0"> Unpublished</label>
                                    <small class="text-danger">{{ $errors->has('publication_status') ? $errors->first('publication_status') : ' ' }}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    <input type="submit" name="btn" class="btn btn-info btn-lg btn-block" value="Save Blog Info">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection