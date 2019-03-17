
@extends('front.master')

@section('title', "Creativity | $blog->blog_name")



@section('main-contain')
    <header class="masthead mb-2">
        <div style="height: 60px;"></div>
        <div class="overlay"></div>
    </header>

    {{--<section></section>--}}
    <div class="container-fluid px-5">
        <div class="row">
            <div class="col-md-2">
                <div class="jumbotron p-2" style="margin-top: 18vh;">
                    <p class="m-0">Self Journalist <i class="fas fa-atlas"></i></p>
                    <hr class="my-2">
                    <small class="m-0">14 Dec 2018, 07 : 10 pm</small><br/>
                    <small class="m-0">Updated : 14 Dec 2018,<br/> 07 : 15 pm</small>
                    <hr class="my-2">
                    <p class="m-0">Contact</p>
                    <hr class="my-2">
                    <small><i class="fa fa-phone"></i> 055-5555-5555</small>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="jumbotron m-4 p-4 bg-light">
                    <h3 class="display-6 mt-2">{{ $blog->blog_name }}</h3>
                    <hr class="my-4">
                    <img src="{{ asset($blog->blog_img) }}" alt="Image" class="rounded" style="height: 500px; width: 100%;">
                    <hr class="my-4">
                    <p class="text-justify">{!!  $blog->long_description !!}</p>
                </div>
            </div>

            <div class="col-md-4" style="margin-top: 25vh;">
                <div class="jumbotron p-2 bg-light">
                    <h4 class="p-3">More News..</h4>
                    <hr class="my-4">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('/') }}/front/img/entertainment1.jpg" alt="Image" style="height: 100px; width: 100%; margin-top: 7px;">
                        </div>
                        <div class="col-md-6">
                            <p class="mt-0">Lorem ipsum dolor sit amet,sed diam voluptua.</p>
                         </div>
                    </div>
                    <hr class="my-2">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('/') }}/front/img/political-rally.jpg" alt="Image" style="height: 100px; width: 100%; margin-top: 7px;">
                        </div>
                        <div class="col-md-6">
                            <p class="mt-0">Lorem ipsum dolor sit amet,sed diam voluptua.</p>
                        </div>
                    </div>
                    <hr class="my-2">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('/') }}/front/img/Health.jpg" alt="Image" style="height: 100px; width: 100%; margin-top: 7px;">
                        </div>
                        <div class="col-md-6">
                            <p class="mt-0">Lorem ipsum dolor sit amet,sed diam voluptua.</p>
                        </div>
                    </div>
                    <hr class="my-2">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('/') }}/front/img/WOMEN_IN_SCIENCE.jpg" alt="Image" style="height: 100px; width: 100%; margin-top: 7px;">
                        </div>
                        <div class="col-md-6">
                            <p class="mt-0">Lorem ipsum dolor sit amet,sed diam voluptua.</p>
                        </div>
                    </div>
                    <hr class="my-2">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('/') }}/front/img/edn.jpg" alt="Image" style="height: 100px; width: 100%; margin-top: 7px;">
                        </div>
                        <div class="col-md-6">
                            <p class="mt-0">Lorem ipsum dolor sit amet,sed diam voluptua.</p>
                        </div>
                    </div>
                    <hr class="my-2">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('/') }}/front/img/Programming-With.png" alt="Image" style="height: 100px; width: 100%; margin-top: 7px;">
                        </div>
                        <div class="col-md-6">
                            <p class="mt-0">Lorem ipsum dolor sit amet,sed diam voluptua.</p>
                        </div>
                    </div>
                    <hr class="my-2">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('/') }}/front/img/Proven-Ways.jpg" alt="Image" style="height: 100px; width: 100%; margin-top: 7px;">
                        </div>
                        <div class="col-md-6">
                            <p class="mt-0">Lorem ipsum dolor sit amet,sed diam voluptua.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Comment Section -->

    <section class="py-5 m-4 bg-light rounded border border-success">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <small class="text-success">{{ Session::get('message') }}</small>
                            @if( Session::get('id'))
                                <form action="{{ route('new-comment') }}" method="post">

                                    @csrf

                                    <div class="form-group">
                                        <label>Enter Your Comment</label>
                                        <input type="hidden" name="blog_id" value="{{ $blog->id }}"/>
                                        <textarea name="comment" class="form-control"></textarea>
                                    </div>
                                    <input type="submit" name="btn" class="btn btn-outline-success rounded" value="Comment"/>
                                </form>
                            @else
                                <p class="text-center">You have to
                                    <a href="{{ route('visitor-login') }}"> Login</a> to Comment, if you are not Registered then
                                    <a href="{{ route('add-visitor') }}"> Register</a> first.
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @php( $i = 0 )
                                @foreach($comments as $comment)
                                    @if( $blog->id == $comment->blog_id )
                                        <h5 style="color: #1c7430;">{{ $comment->visitor->first_name.' '.$comment->visitor->last_name }}</h5>
                                        <p class="lead m-0">{{ $comment->comment }}</p>
                                        <label style="font-size: 16px;"><input type="radio" name="status" value="1"> Like</label>
                                        <label style="font-size: 16px;"><input type="radio" name="status" value="0"> Unlike</label>
                                        <hr/>
                                    @php( $i++ )
                                    @endif
                                @endforeach
                                @if( $i == 0 )
                                    <p class="lead m-0 text-center">No Comments yet..</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <!-- //Comment Section -->

    <!-- Related Blogs Section -->

    <section class="py-5 bg-light m-4 rounded">
        <div class="container-fluid px-5">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center pb-5">Related Blos</h3>
                </div>
            </div>
            <div class="row">
                @foreach($categoryBlogs as $categoryBlog)
                    <div class="col-md-3 pb-4">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset($categoryBlog->blog_img) }}" alt="Image" style="height: 200px">
                            <div class="card-body">
                                <h5 class="card-title">{{ $categoryBlog->blog_name }}</h5>
                                <p class="card-text">{{ $categoryBlog->short_description }}</p>
                                <a href="{{ route('read-more', [ 'id' => $categoryBlog->id, 'name' => preg_replace('/\s+/u', '-', trim($categoryBlog->blog_name)) ]) }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- //Related Blogs Section -->
@endsection