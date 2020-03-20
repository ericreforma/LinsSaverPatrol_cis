<div class="topbar">
    <div class="logo_container">
        <img src="{{ asset('/img/logo_big.jpg') }}" />
        <h1>Saver Patrol</h1>
    </div>
    <div class="menu_button_container">
        <div>
            <button class="btn btn-light menu_button">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
    <div class="account_container dropdown">


        @if(Auth::user()->media_id == 0)
            <div class="profile_picture dropdown-toggle" id="accountMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ substr(Auth::user()->username, 0, 1) }}
            </div>
        @else 
            <div class="profile_picture dropdown-toggle" id="accountMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-image: url('/influencer/LinsSaverPatrol_CIS/public/storage/media/{{ Auth::user()->media->url }}')">
            </div>
        @endif

        
        <div class="dropdown-menu account_menu" aria-labelledby="dropdownMenuButton">
            <div class="account_profile">
                @if(Auth::user()->media_id == 0)
                <div class="profile_picture">
                    {{ substr(Auth::user()->username, 0, 1) }}
                </div>
                @else 
                <div class="profile_picture" style="background-image: url('/influencer/LinsSaverPatrol_CIS/public/storage/media/{{ Auth::user()->media->url }}')">
                </div>
                @endif
                
                <div class="profile_name">
                    <h5>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h5>
                    <h6>{{ Auth::user()->email }} </h6>
                </div>
            </div>

            <div class="dropdown-divider"></div>

            <a class="dropdown-item" href="{{ route('profile') }}">
                <i class="fas fa-cog"></i><span>Profile</span>
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