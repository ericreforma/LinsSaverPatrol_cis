<div class="navigation">
    <ul class="main-menu">
        @foreach(Auth::user()->privileges as $priv)
            @if($priv->feature_id == 1 && $priv->role_view == 1)
                <li class="{{session('active_nav') == 'customer' ? 'active' : ''}}"><a href="{{ route('customer_list') }}"><i class="fas fa-store"></i><span>Customers</span></a></li>
            @endif

            @if($priv->feature_id == 2 && $priv->role_view == 1)
                <li class="{{session('active_nav') == 'items' ? 'active' : ''}}"><a href="{{ route('item_list') }}"><i class="fas fa-box-open"></i><span>Items</span></a></li>
            @endif

            @if($priv->feature_id == 3 && $priv->role_view == 1)
                <li class="{{session('active_nav') == 'reports' ? 'active' : ''}}"><a href="{{ route('report_view') }}"><i class="fas fa-clipboard-list"></i><span>Reports</span></a></li>
            @endif

            @if($priv->feature_id == 4 && $priv->role_view == 1)
                <li class="{{session('active_nav') == 'users' ? 'active' : ''}}"><a href="{{ route('users_list') }}"><i class="far fa-address-book"></i><span>User Management</span></a></li>
            @endif
        @endforeach
        <!-- <li class="{{session('active_nav') == 'store_category' ? 'active' : ''}}"><a href=""><i class="fas fa-store-alt"></i><span>Store Categories</span></a></li> -->
        <!-- <li class="{{session('active_nav') == 'geo' ? 'active' : ''}}"><a href=""><i class="fas fa-globe-asia"></i><span>Geo Data</span></a></li> -->
    </ul>
</div>
<div class="menu_cover"></div>