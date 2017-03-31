<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">Main Menu</li>
            <li @if(isset($_active_menu) && $_active_menu == 'dashboard') class="active" @endif ><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li @if(isset($_active_menu) && $_active_menu == 'hospitals') class="active" @endif ><a href="{{ route('admin.hospitals.index') }}"><i class="fa fa-hospital-o"></i> <span>Spitale</span></a></li>
            <li @if(isset($_active_menu) && $_active_menu == 'users') class="active" @endif ><a href="{{ route('admin.users.index') }}"><i class="fa fa-users"></i> <span>Useri</span></a></li>

        </ul>
        <ul class="sidebar-menu">
            <li class="header">Adverts</li>

        </ul>
    </section>
</aside>