

@extends('admin.master')

@section('title')
    Admin Panel | Manage Blog
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
        <h3>Manage Blog</h3>

        <h2 style="color: green">{{ Session::get('message') }}</h2>

        <div class="bs-example4" data-example-id="contextual-table">
            <table class="table table-striped table-hover table-bordered table-responsive-sm">
                <thead>
                <tr>
                    <th>SL NO</th>
                    <th>Category Name</th>
                    <th>Blog Name</th>
                    <th>Blog Image</th>
                    <th>Publication Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @php( $x=1 )
                @foreach($blogs as $blog)
                    <tr>
                        <td>{{ $x++ }}</td>
                        <td>{{ $blog->category->category_name }}</td>
                        <td>{{ $blog->blog_name }}</td>
                        <td>
                            <img src="{{ asset($blog->blog_img) }}" alt="Image" height="120" width="150">
                        </td>
                        <td>{{ $blog->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                        <td>
                            <a href="{{ route('view-blog', [ 'id' =>$blog->id ]) }}" title="View Detail" class="btn btn-info">
                                <span class="glyphicon glyphicon-zoom-in"></span>
                            </a> ||
                            <a href="{{ route('edit-blog', [ 'id' =>$blog->id ]) }}" title="Edit Blog" class="btn btn-primary">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a> ||
                            <a href="{{ route('delete-blog', [ 'id' =>$blog->id ]) }}" title="Delete Blog" onclick="return confirm('Are You Sure..!!')" class="btn btn-danger">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection