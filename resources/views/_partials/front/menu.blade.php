<div class="list-group">
    <a href="{{ route('hospital.dashboard.index') }}" @if(isset($_active_menu) && $_active_menu == 'hospitalDashboard') class="list-group-item active" @else class="list-group-item" @endif> Dashboard </a>
    <a href="{{ route('hospital.information.index') }}" @if(isset($_active_menu) && $_active_menu == 'information') class="list-group-item active" @else class="list-group-item" @endif> Informații spital </a>
    <a href="{{ route('hospital.hospitalDescription.index') }}" @if(isset($_active_menu) && $_active_menu == 'hospitalDescription') class="list-group-item active" @else class="list-group-item" @endif> Descriere spital </a>
    <a href="#" class="list-group-item"> Cuvant manager </a>
    <a href="#" class="list-group-item"> Specialitati spital </a>
    <a href="#" class="list-group-item"> Ambulatoriu spital </a>
    <a href="#" class="list-group-item"> Medici </a>
    <a href="#" class="list-group-item"> Indicatori </a>
    <a href="#" class="list-group-item"> Anunturi </a>
    <a href="#" class="list-group-item"> Raspuns mesaje </a>                                                 
</div>