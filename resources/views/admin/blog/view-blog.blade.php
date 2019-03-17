


@extends('admin.master')

@section('title')
    Admin Panel View Blog
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



    <div class="xs">
        <h3>View Blog</h3>

        <h2 style="color: green">{{ Session::get('message') }}</h2>

        <div class="bs-example4" data-example-id="contextual-table">
            <table class="table table-striped table-hover table-bordered table-responsive-sm">

                <tr>
                    <th>Blog Id</th>
                    <td>{{ $blog->id }}</td>
                </tr>
                <tr>
                    <th>Blog Nmae</th>
                    <td>{{ $blog->blog_name }}</td>
                </tr>
                <tr>
                    <th>Category Id</th>
                    <td>{{ $blog->category_id }}</td>
                </tr>
                <tr>
                    <th>Blog Short Description</th>
                    <td>{{ $blog->short_description }}</td>
                </tr>
                <tr>
                    <th>Blog Long Description</th>
                    <td>{{ $blog->long_description }}</td>
                </tr>
                <tr>
                    <th>Blog Image</th>
                    <td>
                        <img src="{{ asset($blog->blog_img) }}" alt="Image" height="250" width="500">
                    </td>
                </tr>
                <tr>
                    <th>Publication Status</th>
                    <td>{{ $blog -> publication_status == 1 ? 'published' : 'Unpublished' }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection