<div class="topbar">
    <div class="logo_container">

    </div>
    <div class="menu_button_container">
        <div>
            <button class="btn btn-light menu_button">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
    <div class="account_container dropdown">

        <div class="profile_picture dropdown-toggle" id="accountMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ substr(Auth::user()->username, 0, 1) }}
        </div>
        <div class="dropdown-menu account_menu" aria-labelledby="dropdownMenuButton">
            <div class="account_profile">
                <div class="profile_picture">
                    {{ substr(Auth::user()->username, 0, 1) }}
                </div>
                <div class="profile_name">
                    <h5>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h5>
                    <h6>{{ Auth::user()->email }} </h6>
                </div>
            </div>
           

            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
                <i class="fas fa-cog"></i><span>Account Settings</span>
            </a>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i><span>Logout</span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </a>
        </div>
    </div>
</div>