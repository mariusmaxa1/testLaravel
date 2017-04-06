<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">Main Menu</li>
            <li @if(isset($_active_menu) && $_active_menu == 'dashboard') class="active" @endif ><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="treeview" @if(isset($_active_menu) && $_active_menu == 'hospitals') class="active treeview" @endif ><a href="{{ route('admin.hospitals.index') }}"><i class="fa fa-hospital-o"></i> <span>Spitale</span></a>

                @if ($_active_menu == 'hospitals')
                <ul class="treeview-menu">                  
                    <li @if(isset($_active_menu) && $_active_menu == 'information') class="active" @endif ><a href="{{ route('admin.hospitals.show.info',  $hospital->id) }}"><i class="fa fa-info"></i> <span>Informatii Spital</span></a></li>
                    <li @if(isset($_active_menu) && $_active_menu == 'description') class="active" @endif ><a href="{{ route('admin.hospitals.show.description',  $hospital->id ) }}"><i class="fa fa-square"></i> <span>Descriere Spital</span></a></li>
                    <li @if(isset($_active_menu) && $_active_menu == 'manager') class="active" @endif ><a href="{{ route('admin.hospitals.show.manager',  $hospital->id ) }}"><i class="fa fa-users"></i> <span>Cuvant Manager</span></a></li>
                    <li @if(isset($_active_menu) && $_active_menu == 'specialities') class="active" @endif ><a href="{{ route('admin.hospitals.index.specialities',  $hospital->id ) }}"><i class="fa fa-heartbeat"></i> <span>Specialitati</span></a></li>
                    <li @if(isset($_active_menu) && $_active_menu == 'ambulatories') class="active" @endif ><a href="{{ route('admin.hospitals.index.ambulatories',  $hospital->id ) }}"><i class="fa fa-plus-square"></i> <span>Ambulatoriu</span></a></li>
                    <li @if(isset($_active_menu) && $_active_menu == 'doctors') class="active" @endif ><a href="{{ route('admin.hospitals.index.doctors', $hospital->id ) }}"><i class="fa fa-user-md"></i> <span>Medici</span></a></li>
                    <li @if(isset($_active_menu) && $_active_menu == 'indicators') class="active" @endif ><a href="{{ route('admin.hospitals.index.indicators',  $hospital->id ) }}"><i class="fa fa-table"></i> <span>Indicatori</span></a></li>
                </ul>
                @endif
            </li>
            <li @if(isset($_active_menu) && $_active_menu == 'users') class="active" @endif ><a href="{{ route('admin.users.index') }}"><i class="fa fa-users"></i> <span>Useri</span></a></li>
            <li @if(isset($_active_menu) && $_active_menu == 'ambulatories') class="active" @endif ><a href="{{ route('admin.ambulatories.index') }}"><i class="fa fa-plus-square"></i> <span>Ambulatorii</span></a></li>
            <li @if(isset($_active_menu) && $_active_menu == 'specialities') class="active" @endif ><a href="{{ route('admin.specialities.index') }}"><i class="fa fa-heartbeat"></i> <span>Specilitati</span></a></li>

        </ul>
        <ul class="sidebar-menu">
            <li class="header">Adverts</li>

        </ul>
    </section>
</aside>