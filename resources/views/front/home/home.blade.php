
@extends('front.master')

@section('title')
    Creativity Blog Home
@endsection

@section('main-contain')
    <header class="masthead" style="background-image: url('{{ asset('/') }}/front/img/pexels-photo.jpeg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Creativity Blog</h1>
                        <span class="subheading">Create Your Own Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <section class="py-5 bg-light m-4 rounded">
        <div class="container-fluid px-5">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center" style="color: green">{{ Session::get('message') }}</h3>
                </div>
            </div>
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-md-3 pb-4">
                        <div class="card pb-4">
                            <img class="card-img-top" src="{{ asset($blog->blog_img) }}" alt="Image" style="height: 200px">
                            <div class="card-body">
                                <h5 class="card-title">{{ $blog->blog_name }}</h5>
                                <p class="card-text">{{ $blog->short_description }}</p>
                                <a href="{{ route('read-more', [ 'id' => $blog->id, 'name' => preg_replace('/\s+/u', '-', trim($blog->blog_name)) ]) }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection