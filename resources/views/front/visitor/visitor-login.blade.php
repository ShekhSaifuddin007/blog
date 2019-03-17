

@extends('front.master')

@section('title')
    Creativity Blog Visitor Login
@endsection

@section('main-contain')
    <header class="masthead" style="background-image: url('{{ asset('/') }}/front/img/computer.jpg')">
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

    <!-- Visitor login Section -->

    <section class="py-5 m-4 bg-light rounded border border-success">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3">
                    <h3>Login</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('login-visitor') }}" method="post">

                                @csrf

                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="email" name="email_address" placeholder="Enter email" class="form-control"/>
                                    <small style="color: red">{{ Session::get('warnMessage') }}</small>
                                    <small class="text-danger">{{ $errors->has('email_address') ? $errors->first('email_address') : ' ' }}</small>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" placeholder="Enter Password" class="form-control"/>
                                    <small class="text-danger">{{ $errors->has('password') ? $errors->first('password') : ' ' }}</small>
                                </div>
                                <input type="submit" name="btn" class="btn btn-outline-success rounded" value="Login"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- //Visitor login Section -->

@endsection