<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li @if(isset($_active_menu) && $_active_menu == 'dashboard') class="active" @endif ><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li @if(isset($_active_menu) && $_active_menu == 'users') class="active" @endif ><a href="{{ route('admin.users.index') }}">Users</a></li>
                <li @if(isset($_active_menu) && $_active_menu == 'apikeys') class="active" @endif ><a href="{{ route('admin.apikeys.index') }}">API Keys</a></li>
                <li @if(isset($_active_menu) && $_active_menu == 'social') class="active" @endif ><a href="{{ route('admin.social.index') }}">Social login</a></li>
                <li @if(isset($_active_menu) && $_active_menu == 'companies') class="active" @endif ><a href="{{ route('admin.companies.index') }}">Companies</a></li>
                <li @if(isset($_active_menu) && $_active_menu == 'jobs') class="active" @endif ><a href="{{ route('admin.jobs.index') }}">Jobs</a></li>
                <li @if(isset($_active_menu) && $_active_menu == 'categories') class="active" @endif ><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                <li @if(isset($_active_menu) && $_active_menu == 'types') class="active" @endif ><a href="{{ route('admin.types.index') }}">Types</a></li>
                <li @if(isset($_active_menu) && $_active_menu == 'paid_services') class="active" @endif ><a href="{{ route('admin.paid_services.index') }}">Paid services</a></li>
                <li @if(isset($_active_menu) && $_active_menu == 'settings') class="active" @endif ><a href="{{ route('admin.settings.mail') }}">Settings</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('admin.users.show', Auth::user()->id) }}">{{ Auth::user()->name }}</a></li>
                <li><a href="{{ route('admin.logout') }}">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>