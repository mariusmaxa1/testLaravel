
@if ($role == "hospital")
<div class="list-group">
    <a href="{{ route('hospital.dashboard.index') }}" @if(isset($_active_menu) && $_active_menu == 'dashboard') class="list-group-item active" @else class="list-group-item" @endif> Dashboard </a>
    <a href="{{ route('hospital.information.index') }}" @if(isset($_active_menu) && $_active_menu == 'information') class="list-group-item active" @else class="list-group-item" @endif> Informații spital </a>
    <a href="{{ route('hospital.description.index') }}" @if(isset($_active_menu) && $_active_menu == 'description') class="list-group-item active" @else class="list-group-item" @endif> Descriere spital </a>
    <a href="{{ route('hospital.manager.index') }}" @if(isset($_active_menu) && $_active_menu == 'manager') class="list-group-item active" @else class="list-group-item" @endif class="list-group-item"> Cuvant manager </a>
    <a href="{{ route('hospital.speciality.index') }}" @if(isset($_active_menu) && $_active_menu == 'speciality') class="list-group-item active" @else class="list-group-item" @endif> Specialitati spital </a>
    <a href="{{ route('hospital.ambulatory.index') }}" @if(isset($_active_menu) && $_active_menu == 'ambulatory') class="list-group-item active" @else class="list-group-item" @endif> Ambulatoriu spital </a>
    <a href="{{ route('hospital.doctors.index') }}" @if(isset($_active_menu) && $_active_menu == 'doctors') class="list-group-item active" @else class="list-group-item" @endif class="list-group-item"> Medici </a>
    <a href="{{ route('hospital.indicators.index') }}" @if(isset($_active_menu) && $_active_menu == 'indicators') class="list-group-item active" @else class="list-group-item" @endif class="list-group-item"> Indicatori </a>
    <a href="{{ route('hospital.news.index') }}" @if(isset($_active_menu) && $_active_menu == 'news') class="list-group-item active" @else class="list-group-item" @endif class="list-group-item"> Anunturi </a>
    <a href="{{ route('hospital.ambulatory.index') }}" @if(isset($_active_menu) && $_active_menu == 'ambulatory') class="list-group-item active" @else class="list-group-item" @endif class="list-group-item"> Raspuns mesaje </a>                                                 
    <a href="{{ route('hospital.account.edit') }}" @if(isset($_active_menu) && $_active_menu == 'account') class="list-group-item active" @else class="list-group-item" @endif class="list-group-item"> Contul meu </a>     
</div>
@endif
@if ($role == "patient")
<div class="list-group">
    <a href="{{ route('hospital.dashboard.index') }}" @if(isset($_active_menu) && $_active_menu == 'dashboard') class="list-group-item active" @else class="list-group-item" @endif> Dashboard </a>
    <a href="{{ route('hospital.dashboard.index') }}" @if(isset($_active_menu) && $_active_menu == 'information') class="list-group-item active" @else class="list-group-item" @endif> Spitale favorite </a>         
    <a href="{{ route('hospital.dashboard.index') }}" @if(isset($_active_menu) && $_active_menu == 'information') class="list-group-item active" @else class="list-group-item" @endif> Farmacii favorite </a> 
    <a href="{{ route('hospital.dashboard.index') }}" @if(isset($_active_menu) && $_active_menu == 'information') class="list-group-item active" @else class="list-group-item" @endif> Medici de familie favoriti</a> 
    <a href="{{ route('hospital.dashboard.index') }}" @if(isset($_active_menu) && $_active_menu == 'information') class="list-group-item active" @else class="list-group-item" @endif> Clinici private favorite </a> 
    <a href="{{ route('hospital.dashboard.index') }}" @if(isset($_active_menu) && $_active_menu == 'information') class="list-group-item active" @else class="list-group-item" @endif> Medici  specialisti favoriti </a> 
    <a href="{{ route('hospital.dashboard.index') }}" @if(isset($_active_menu) && $_active_menu == 'information') class="list-group-item active" @else class="list-group-item" @endif> Laboratoarea favorite </a> 
    <a href="{{ route('hospital.dashboard.index') }}" @if(isset($_active_menu) && $_active_menu == 'information') class="list-group-item active" @else class="list-group-item" @endif> Stomatologi favoriti </a> 
    <a href="{{ route('hospital.dashboard.index') }}" @if(isset($_active_menu) && $_active_menu == 'information') class="list-group-item active" @else class="list-group-item" @endif> Programari </a>
    <a href="{{ route('patient.account.edit') }}" @if(isset($_active_menu) && $_active_menu == 'account') class="list-group-item active" @else class="list-group-item" @endif> Contul meu </a>
</div>
@endif

@if ($role == "default")
<div class="list-group">
    <a href="{{ route('hospital.dashboard.index') }}" @if(isset($_active_menu) && $_active_menu == 'dashboard') class="list-group-item active" @else class="list-group-item" @endif> Dashboard </a>
    <a href="{{ route('hospital.dashboard.index') }}" @if(isset($_active_menu) && $_active_menu == 'dashboard') class="list-group-item active" @else class="list-group-item" @endif> Descriere </a>
    <a href="{{ route('hospital.dashboard.index') }}" @if(isset($_active_menu) && $_active_menu == 'dashboard') class="list-group-item active" @else class="list-group-item" @endif> Program </a>
    <a href="{{ route('hospital.dashboard.index') }}" @if(isset($_active_menu) && $_active_menu == 'information') class="list-group-item active" @else class="list-group-item" @endif> Programari </a>
    <a href="" @if(isset($_active_menu) && $_active_menu == 'account') class="list-group-item active" @else class="list-group-item" @endif> Contul meu </a>
</div>
@endif