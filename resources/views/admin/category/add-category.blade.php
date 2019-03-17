
@extends('admin.master')

@section('title')
    Admin Panel Add Category
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
                        <h3>Add Category</h3>
                    </div>
                    <div class="panel-body">
                        <div class="container">

                            <h2 class="text-success">{{ Session::get('message') }}</h2>
                            <h2 class="text-danger">{{ Session::get('warnMessage') }}</h2>

                            <form action="{{ route('new-category') }}" method="post" class="form-horizontal">

                                @csrf

                                <div class="form-group">
                                    <label class="col-md-3" style="font-size: 18px; font-weight: bold">Category Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="category_name" class="form-control1">
                                        <small class="text-danger">{{ $errors->has('category_name') ? $errors->first('category_name') : ' ' }}</small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3" style="font-size: 18px; font-weight: bold">Category Description</label>
                                    <div class="col-md-9">
                                        <textarea name="category_description" rows="10" cols="103"></textarea>
                                        <small class="text-danger">{{ $errors->has('category_description') ? $errors->first('category_description') : ' ' }}</small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3" style="font-size: 18px; font-weight: bold">Publication Status</label>
                                    <div class="col-md-9">
                                        <label><input type="radio" name="publication_status" value="1"> Published</label>
                                        <label><input type="radio" name="publication_status" value="0"> Unpublished</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-3">
                                        <input type="submit" name="btn" class="btn btn-info btn-lg btn-block" value="Save Category Info">
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection