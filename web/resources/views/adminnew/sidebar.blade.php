<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ asset('admin/statistical') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>

        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ asset('admin/product') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Product management</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ asset('admin/order') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Order management</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Product Variants</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic" style="">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ asset('admin/color')}}">Colors</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ asset('admin/size')}}">Sizes</a></li>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
