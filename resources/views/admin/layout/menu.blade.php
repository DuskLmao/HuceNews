<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            <div class="pcoded-navigation-label">UI Element</div>
            <ul class="pcoded-item pcoded-left-item">
                <!-- Category -->
                <li class="pcoded">
                    <a href="admin/category/list" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-menu "></i>
                        </span>
                        <span class="pcoded-mtext">Danh Mục</span>
                    </a>
                </li>
                <!-- Sub Category -->
                <li class="pcoded">
                    <a href="admin/subcategory/list" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-align-left "></i>
                        </span>
                        <span class="pcoded-mtext">Danh Mục Con</span>
                    </a>
                </li>
                <!-- News -->
                <li class="pcoded">
                    <a href="admin/news/list" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-book "></i>
                        </span>
                        <span class="pcoded-mtext">Tin Tức<!--[if !IE]><!--><!--<![endif]--></span>
                    </a>
                </li>
                <!-- Banner -->
                <li class="pcoded">
                    <a href="admin/banner/list" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-aperture "></i>
                        </span>
                        <span class="pcoded-mtext">Banner</span>
                    </a>
                </li>
                <!-- User - Chỉ hiển thị cho Admin -->
                @if(auth()->user()->role === 1)
                <li class="pcoded">
                    <a href="admin/user/list" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-user "></i>
                        </span>
                        <span class="pcoded-mtext">Người Dùng</span>
                    </a>
                </li>
                @endif
                <!-- About -->
                <li class="pcoded">
                    <a href="admin/about" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-info "></i>
                        </span>
                        <span class="pcoded-mtext">About</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>