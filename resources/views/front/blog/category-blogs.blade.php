
@extends('front.master')

@section('title')
    Creativity Blog {{ $category->category_name }}
@endsection

@section('main-contain')
    <header class="masthead" style="background-image: url('{{ asset('/') }}/front/img/computer.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">

                        <h1>{{ $category->category_name }}</h1>

                        <span class="subheading">Create Your Own Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Category Section -->

    <section class="py-5 bg-light m-4 rounded">
        <div class="container-fluid px-5">
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-md-3 pb-4">
                        <div class="card">
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

    <!-- //Category Section -->

@endsection