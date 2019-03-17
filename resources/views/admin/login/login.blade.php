
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log/Reg Form</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/back') }}/css/login.css">
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#"><i class="fab fa-accusoft"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="" data-toggle="modal" data-target="#login">Login
                        <i class="fas fa-sign-in-alt"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="" data-toggle="modal" data-target="#register">Rgister
                        <i class="fas fa-registered"></i></a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- //Navigation -->

<!-- Login Form modal -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-0">
            <div class="modal fade" id="login">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Login Form</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <i class="far fa-times-circle"></i>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('login') }}" method="POST">

                                @csrf

                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" value="{{ old('email') }}" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Enter email" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif

                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Enter Password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif

                                    <i class="fas fa-lock"></i>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="check">
                                    <label class="form-check-label" for="check">Remember me</label>
                                </div>
                                <button type="submit" class="btn btn-block" name="btn">Log in
                                    <i class="fas fa-sign-in-alt"></i>
                                </button>
                                <p class="forgot mt-3">
                                    <a href="">Forgot Password.?</a>
                                </p>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- //Login Form modal -->


            <!-- Registration Form modal -->
            <div class="modal fade" id="register">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Registration Form</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <i class="far fa-times-circle"></i>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('register') }}" method="POST">

                                @csrf

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter your Name" required>
                                    <i class="fab fa-neos"></i>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Enter Password"
                                           required>
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div class="form-group">
                                    <label for="password">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password"
                                           required>
                                    <i class="fas fa-check-double"></i>
                                </div>
                                <button type="submit" class="btn btn-block" name="btn">Register <i class="fas fa-registered"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //Registration Form modal -->



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>