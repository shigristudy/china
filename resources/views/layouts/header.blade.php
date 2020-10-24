<nav class="navbar-custom-menu navbar navbar-expand-lg m-0">
    <div class="sidebar-toggle-icon" id="sidebarCollapse">
        sidebar toggle<span></span>
    </div>
    <div class="d-flex flex-grow-1">
        <ul class="navbar-nav flex-row align-items-center ml-auto">
            <li class="nav-item dropdown dropdown-lang mr-3">
                @php $locale = session()->get('locale'); @endphp
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                    @switch($locale)
                        @case('en')
                        <span> EN</span>
                        @break
                        @case('de')
                        <span> DE</span>
                        @break
                        @default
                       <span> EN</span>
                    @endswitch
                </a>
                <ul class="dropdown-menu dropdown-menu-right p-2" style="min-width: 8rem; top:45px;">
                    <li><a class="dropdown-item pt-2 pl-2" href="{{route('lang', 'en')}}">EN</a></li>
                    <li><a class="dropdown-item pt-1 pl-2" href="{{route('lang', 'de')}}">DE</a></li>

                </ul>
            </li>
            <li class="nav-item dropdown user-menu">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                    <i class="far fa-user-circle"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right py-2" >
                    <div class="dropdown-header d-sm-none">
                        <a href="#" class="header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                    </div>
                    <a href="{{route('admin.change_password')}}" class="dropdown-item"><i class="fas fa-lock"></i>Change Password</a>
                    <a href="{{ route('admin.logout') }}" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Sign out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>