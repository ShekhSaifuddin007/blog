

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ route('/') }}">CREATIVITY</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown">
                            Categories
                        </a>
                        <div class="dropdown-menu">
                            @foreach($categories as $category)
                                <a class="dropdown-item" href="{{ route('category-blogs', [ 'id' => $category->id ]) }}">{{ $category->category_name }}</a>
                            @endforeach
                        </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
                @if( Session::get('id') )
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown">
                            {{ Session::get('name') }}
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('visitor-logout') }}">{{ __('Logout') }}</a>
                        </div>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown">
                            <i class="fas fa-user" style="font-size: 18px;"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('visitor-login') }}">{{ __('Login') }}</a>
                            <a class="dropdown-item" href="{{ route('add-visitor') }}">{{ __('Register') }}</a>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>