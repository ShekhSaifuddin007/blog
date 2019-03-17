
@extends('front.master')

@section('title')
    Creativity Blog Visitor Registration
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

    <!-- Visitor register Section -->

    <section class="py-5 m-4 bg-light rounded border border-success">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3">
                    <h3>Register Here</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <small class="text-danger">{{ Session::get('warnMessage') }}</small>
                            <form action="{{ route('new-visitor') }}" method="post">

                                @csrf

                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" placeholder="First Name" class="form-control"/>
                                    <small class="text-danger">{{ $errors->has('first_name') ? $errors->first('first_name') : ' ' }}</small>
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" placeholder="Last Name" class="form-control"/>
                                    <small class="text-danger">{{ $errors->has('last_name') ? $errors->first('last_name') : ' ' }}</small>
                                </div>
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="email" name="email_address" placeholder="Enter email" class="form-control" id="email"/>
                                    <small class="text-danger">{{ $errors->has('email_address') ? $errors->first('email_address') : ' ' }}</small>
                                    <small class="text-danger" id="result"></small>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" placeholder="Enter Password" class="form-control"/>
                                    <small class="text-danger">{{ $errors->has('password') ? $errors->first('password') : ' ' }}</small>
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="number" name="phone_number" placeholder="Phone Number" class="form-control"/>
                                </div>
                                <input type="submit" id="createAccBtn" class="btn btn-outline-success rounded" value="Create Account"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- //Visitor register Section -->
    
    
    <script>
        function backError(email)
        {
            $.ajax({
                url     : 'http://localhost/blog_laravel/public/ajax/email-check/' + email,
                method  : 'GET',
                type    : 'JSON',
                data    : {email : email},
                success : function (response) {
                    $('#result').html(response);

                    if (response == 'This email address already exist..')
                    {
                        $('#createAccBtn').prop('disabled', true);
                    }
                    else
                    {
                        $('#createAccBtn').prop('disabled', false);

                        //we can also use
                        //$('#createAccBtn').attr('enabled', true);
                    }

                }
            });
        }


        var  emailCheck = document.getElementById('email');

        emailCheck.onblur = function () {
            backError(this.value);
        }



        // function backError(email) {
        //     var xmlHttp = new XMLHttpRequest();
        //
        //     var server = 'http://localhost/blog_laravel/public/ajax/email-check/' + email;
        //
        //     xmlHttp.open('GET', server);
        //
        //     xmlHttp.onreadystatechange = function () {
        //         if ( xmlHttp.readyState == 4 && xmlHttp.status == 200 ) {
        //             document.getElementById('result').innerHTML = xmlHttp.responseText;
        //
        //             if (xmlHttp.responseText == 'This email address already exist..')
        //             {
        //                 document.getElementById('createAccBtn').disabled = true;
        //             }
        //             else
        //             {
        //                 document.getElementById('createAccBtn').disabled = false;
        //             }
        //         }
        //     }
        //     xmlHttp.send();
        // }



    </script>

@endsection