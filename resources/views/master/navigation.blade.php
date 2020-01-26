<div class="navigation">
    <ul class="main-menu">

        <li class="{{session('active_nav') == 'customer' ? 'active' : ''}}"><a href="/customer/list"><i class="fas fa-store"></i><span>Customers</span></a></li>
        <li class="{{session('active_nav') == 'items' ? 'active' : ''}}"><a href=""><i class="fas fa-box-open"></i><span>Items</span></a></li>
        <li class="{{session('active_nav') == 'store_category' ? 'active' : ''}}"><a href=""><i class="fas fa-store-alt"></i><span>Store Categories</span></a></li>
        <li class="{{session('active_nav') == 'geo' ? 'active' : ''}}"><a href=""><i class="fas fa-globe-asia"></i><span>Geo Data</span></a></li>
        <li class="{{session('active_nav') == 'reports' ? 'active' : ''}}"><a href=""><i class="fas fa-clipboard-list"></i><span>Reports</span></a></li>
        <li class="{{session('active_nav') == 'user_access' ? 'active' : ''}}"><a href=""><i class="far fa-address-book"></i><span>User Access</span></a></li>

    </ul>

</div>