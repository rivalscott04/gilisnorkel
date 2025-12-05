<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('admin.home') }}" class="app-brand-link">
            <img src="{{ asset('assets/img/favicon/favicon.png') }}" alt="logo">
            <span class="app-brand-text menu-text fw-bold ms-4">
                <span class="text-logo-orange">Gili </span><br>
                <span class="text-logo-green">Snorkeling</span>
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
            <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-divider mt-0"></div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Page -->
        <li class="menu-item {{ request()->routeIs('admin.home') ? 'active' : '' }}">
            <a href="{{ route('admin.home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>
{{--        <li class="menu-header small text-uppercase"><span class="menu-header-text">Menu Aplikasi</span></li>--}}

        @foreach ($menuData[0]->menu as $menu)

            {{-- adding active and open class if child is active --}}

            {{-- menu headers --}}
            @if (isset($menu->menuHeader))
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">{{ $menu->menuHeader }}</span>
                </li>

            @else

                {{-- active menu method --}}
                @php
                    $activeClass = null;
                    $currentRouteName = request()->segment(2);

                    if ($currentRouteName === $menu->slug) {
                        $activeClass = 'active';
                    }
                    elseif (isset($menu->submenu)) {
                        if (gettype($menu->slug) === 'array') {
                            foreach($menu->slug as $slug){
                                if (str_contains($currentRouteName,$slug) and strpos($currentRouteName,$slug) === 0) {
                                    $activeClass = 'active open';
                                }
                            }
                        }
                        else{
                            if (str_contains($currentRouteName,$menu->slug) and strpos($currentRouteName,$menu->slug) === 0) {
                                $activeClass = 'active open';
                            }
                        }

                    }
                @endphp

                @if(auth()->user()->has_permissions->contains($menu->slug) || auth()->user()->is_admin())
                {{-- main menu --}}
                <li class="menu-item {{$activeClass}}">
                    <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0);' }}" class="{{ isset($menu->submenu) ? 'menu-link menu-toggle' : 'menu-link' }}" @if (isset($menu->target) and !empty($menu->target)) target="_blank" @endif>
                        @isset($menu->icon)
                            <i class="{{ $menu->icon }}"></i>
                        @endisset
                        <div>{{ isset($menu->name) ? __($menu->name) : ''  }}</div>
                    </a>

                    {{-- submenu --}}
                    @isset($menu->submenu)
                        @include('includes.submenu',['menu' => $menu->submenu])
                    @endisset
                </li>
                @endif
            @endif
        @endforeach
    </ul>
</aside>
<!-- / Menu -->

<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
