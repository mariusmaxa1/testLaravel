<header class="main-header">
    <a href="{{ route('admin.dashboard') }}" class="logo">
        <span class="logo-mini"><b>A</b></span>
        <span class="logo-lg"><b>Admin</b>Dashboard</span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('admin.users.show', Auth::user()->id) }}">{{ Auth::user()->name }}</a></li>
                <li><a href="{{ route('admin.logout') }}">Logout</a></li>
            </ul>
        </div>
    </nav>
</header>