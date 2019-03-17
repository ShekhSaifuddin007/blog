
<nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('home') }}">Blog</a>
    </div>
    <!-- /.navbar-header -->
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-comments-o"></i><span class="badge">4</span></a>
            <ul class="dropdown-menu">
                <li class="dropdown-menu-header">
                    <strong>Messages</strong>
                    <div class="progress thin">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                            <span class="sr-only">40% Complete (success)</span>
                        </div>
                    </div>
                </li>
                <li class="avatar">
                    <a href="#">
                        <img src="{{ asset('/dash') }}/images/1.png" alt=""/>
                        <div>New message</div>
                        <small>1 minute ago</small>
                        <span class="label label-info">NEW</span>
                    </a>
                </li>
                <li class="avatar">
                    <a href="#">
                        <img src="{{ asset('/dash') }}/images/2.png" alt=""/>
                        <div>New message</div>
                        <small>1 minute ago</small>
                        <span class="label label-info">NEW</span>
                    </a>
                </li>
                <li class="avatar">
                    <a href="#">
                        <img src="{{ asset('/dash') }}/images/3.png" alt=""/>
                        <div>New message</div>
                        <small>1 minute ago</small>
                    </a>
                </li>
                <li class="avatar">
                    <a href="#">
                        <img src="{{ asset('/dash') }}/images/4.png" alt=""/>
                        <div>New message</div>
                        <small>1 minute ago</small>
                    </a>
                </li>
                <li class="avatar">
                    <a href="#">
                        <img src="{{ asset('/dash') }}/images/5.png" alt=""/>
                        <div>New message</div>
                        <small>1 minute ago</small>
                    </a>
                </li>
                <li class="avatar">
                    <a href="#">
                        <img src="{{ asset('/dash') }}/images/pic1.png" alt=""/>
                        <div>New message</div>
                        <small>1 minute ago</small>
                    </a>
                </li>
                <li class="dropdown-menu-footer text-center">
                    <a href="#">View all messages</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown">
                {{ Auth::user()->name}}
                <img src="{{ asset('/dash') }}/images/sabbir.jpg">
                <span class="badge">9</span>
            </a>
            <ul class="dropdown-menu">
                <li class="dropdown-menu-header text-center">
                    <strong>Account</strong>
                </li>
                <li class="m_2"><a href="#"><i class="fa fa-bell-o"></i> Updates <span class="label label-info">42</span></a></li>
                <li class="m_2"><a href="#"><i class="fa fa-envelope-o"></i> Messages <span class="label label-success">42</span></a></li>
                <li class="m_2"><a href="#"><i class="fa fa-tasks"></i> Tasks <span class="label label-danger">42</span></a></li>
                <li><a href="#"><i class="fa fa-comments"></i> Comments <span class="label label-warning">42</span></a></li>
                <li class="dropdown-menu-header text-center">
                    <strong>Settings</strong>
                </li>
                <li class="m_2"><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                <li class="m_2"><a href="#"><i class="fa fa-wrench"></i> Settings</a></li>
                <li class="m_2"><a href="#"><i class="fa fa-usd"></i> Payments <span class="label label-default">42</span></a></li>
                <li class="m_2"><a href="#"><i class="fa fa-file"></i> Projects <span class="label label-primary">42</span></a></li>
                <li class="divider"></li>
                <li class="m_2"><a href="#"><i class="fa fa-shield"></i> Lock Profile</a></li>

                <li class="m_2"><a href="#" onclick="event.preventDefault();
                                                        document.getElementById('logoutForm').submit();">
                        <i class="fa fa-lock"></i>{{ __('Logout') }} </a>

                    <form id="logoutForm" action="{{ 'logout' }}" method="post">
                        @csrf
                    </form>

                </li>
            </ul>
        </li>
    </ul>
    <form class="navbar-form navbar-right">
        <input type="text" class="form-control" placeholder="Search...">
    </form>
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{ route('home') }}"><i class="fa fa-dashboard fa-fw nav_icon"></i>Dashboard</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-laptop nav_icon"></i>{{ __('Category') }}<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('add-category') }}">{{ __('Add Category') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('manage') }}">{{ __('Manage Category') }}</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-indent nav_icon"></i>{{ __('Blog') }}<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('add-blog') }}">{{ __('Add Blog') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('manage-blog') }}">{{ __('Manage Blog') }}</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-envelope nav_icon"></i>Mailbox<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="inbox.html">Inbox</a>
                        </li>
                        <li>
                            <a href="compose.html">Compose email</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="widgets.html"><i class="fa fa-flask nav_icon"></i>Widgets</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-check-square-o nav_icon"></i>Forms<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="forms.html">Basic Forms</a>
                        </li>
                        <li>
                            <a href="validation.html">Validation</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-table nav_icon"></i>Tables<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="basic_tables.html">Basic Tables</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-sitemap fa-fw nav_icon"></i>Css<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="media.html">Media</a>
                        </li>
                        <li>
                            <a href="login.html">Login</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>