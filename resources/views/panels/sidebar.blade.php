@php
$configData = Helper::applClasses();
@endphp
<div class="main-menu menu-fixed {{ $configData['theme'] === 'dark' || $configData['theme'] === 'semi-dark' ? 'menu-dark' : 'menu-light' }} menu-accordion menu-shadow"
    data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span class="brand-logo">

                        <!-- <img src=""/> -->
                    </span>
                    <h2 class="brand-text">Admin Panel</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pe-0" data-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc"
                        data-ticon="disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            {{-- Foreach menu item starts --}}

            @if (isset($menuData[0]))

            @if (Auth::guard('teacher')->check())
                @foreach ($menuData[4]->menu as $menu)
                @if (isset($menu->navheader))
                <li class="navigation-header">
                    <span>{{ __($menu->navheader) }}</span>
                    <i data-feather="more-horizontal"></i>
                </li>
                @else
                {{-- Add Custom Class with nav-item --}}
                @php
                $custom_classes = '';
                if (isset($menu->classlist)) {
                $custom_classes = $menu->classlist;
                }
                @endphp
                <li class="nav-item {{ $custom_classes }} {{ Route::currentRouteName() === $menu->slug ? 'active' : '' }}">
                    <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0)' }}"
                        class="d-flex align-items-center" target="{{ isset($menu->newTab) ? '_blank' : '_self' }}">
                        <i data-feather="{{ $menu->icon }}"></i>
                        <span class="menu-title text-truncate">{{ __($menu->name) }}</span>
                        @if (isset($menu->badge))
                        <?php $badgeClasses = 'badge rounded-pill badge-light-primary ms-auto me-1'; ?>
                        <span
                            class="{{ isset($menu->badgeClass) ? $menu->badgeClass : $badgeClasses }}">{{ $menu->badge }}</span>
                        @endif
                    </a>
                    @if (isset($menu->submenu))
                    @include('panels/submenu', ['menu' => $menu->submenu])
                    @endif
                </li>
                @endif
                @endforeach

            @elseif (Auth::guard('headTeacher')->check())

                @foreach ($menuData[3]->menu as $menu)
                @if (isset($menu->navheader))
                <li class="navigation-header">
                    <span>{{ __($menu->navheader) }}</span>
                    <i data-feather="more-horizontal"></i>
                </li>
                @else
                {{-- Add Custom Class with nav-item --}}
                @php
                $custom_classes = '';
                if (isset($menu->classlist)) {
                $custom_classes = $menu->classlist;
                }
                @endphp
                <li class="nav-item {{ $custom_classes }} {{ Route::currentRouteName() === $menu->slug ? 'active' : '' }}">
                    <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0)' }}"
                        class="d-flex align-items-center" target="{{ isset($menu->newTab) ? '_blank' : '_self' }}">
                        <i data-feather="{{ $menu->icon }}"></i>
                        <span class="menu-title text-truncate">{{ __($menu->name) }}</span>
                        @if (isset($menu->badge))
                        <?php $badgeClasses = 'badge rounded-pill badge-light-primary ms-auto me-1'; ?>
                        <span
                            class="{{ isset($menu->badgeClass) ? $menu->badgeClass : $badgeClasses }}">{{ $menu->badge }}</span>
                        @endif
                    </a>
                    @if (isset($menu->submenu))
                    @include('panels/submenu', ['menu' => $menu->submenu])
                    @endif
                </li>
                @endif
                @endforeach

            @elseif (Auth::guard('admin')->check())

                @foreach ($menuData[0]->menu as $menu)
                @if (isset($menu->navheader))
                <li class="navigation-header">
                    <span>{{ __($menu->navheader) }}</span>
                    <i data-feather="more-horizontal"></i>
                </li>
                @else
                {{-- Add Custom Class with nav-item --}}
                @php
                $custom_classes = '';
                if (isset($menu->classlist)) {
                $custom_classes = $menu->classlist;
                }
                @endphp
                <li class="nav-item {{ $custom_classes }} {{ Route::currentRouteName() === $menu->slug ? 'active' : '' }}">
                    <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0)' }}"
                        class="d-flex align-items-center" target="{{ isset($menu->newTab) ? '_blank' : '_self' }}">
                        <i data-feather="{{ $menu->icon }}"></i>
                        <span class="menu-title text-truncate">{{ __($menu->name) }}</span>
                        @if (isset($menu->badge))
                        <?php $badgeClasses = 'badge rounded-pill badge-light-primary ms-auto me-1'; ?>
                        <span
                            class="{{ isset($menu->badgeClass) ? $menu->badgeClass : $badgeClasses }}">{{ $menu->badge }}</span>
                        @endif
                    </a>
                    @if (isset($menu->submenu))
                    @include('panels/submenu', ['menu' => $menu->submenu])
                    @endif
                </li>
                @endif
                @endforeach

            @elseif (Auth::guard('is')->check())

                @foreach ($menuData[5]->menu as $menu)
                @if (isset($menu->navheader))
                <li class="navigation-header">
                    <span>{{ __($menu->navheader) }}</span>
                    <i data-feather="more-horizontal"></i>
                </li>
                @else
                {{-- Add Custom Class with nav-item --}}
                @php
                $custom_classes = '';
                if (isset($menu->classlist)) {
                $custom_classes = $menu->classlist;
                }
                @endphp
                <li class="nav-item {{ $custom_classes }} {{ Route::currentRouteName() === $menu->slug ? 'active' : '' }}">
                    <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0)' }}"
                        class="d-flex align-items-center" target="{{ isset($menu->newTab) ? '_blank' : '_self' }}">
                        <i data-feather="{{ $menu->icon }}"></i>
                        <span class="menu-title text-truncate">{{ __($menu->name) }}</span>
                        @if (isset($menu->badge))
                        <?php $badgeClasses = 'badge rounded-pill badge-light-primary ms-auto me-1'; ?>
                        <span
                            class="{{ isset($menu->badgeClass) ? $menu->badgeClass : $badgeClasses }}">{{ $menu->badge }}</span>
                        @endif
                    </a>
                    @if (isset($menu->submenu))
                    @include('panels/submenu', ['menu' => $menu->submenu])
                    @endif
                </li>
                @endif
                @endforeach

            @elseif (Auth::guard('dpc')->check())

                @foreach ($menuData[6]->menu as $menu)
                @if (isset($menu->navheader))
                <li class="navigation-header">
                    <span>{{ __($menu->navheader) }}</span>
                    <i data-feather="more-horizontal"></i>
                </li>
                @else
                {{-- Add Custom Class with nav-item --}}
                @php
                $custom_classes = '';
                if (isset($menu->classlist)) {
                $custom_classes = $menu->classlist;
                }
                @endphp
                <li class="nav-item {{ $custom_classes }} {{ Route::currentRouteName() === $menu->slug ? 'active' : '' }}">
                    <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0)' }}"
                        class="d-flex align-items-center" target="{{ isset($menu->newTab) ? '_blank' : '_self' }}">
                        <i data-feather="{{ $menu->icon }}"></i>
                        <span class="menu-title text-truncate">{{ __($menu->name) }}</span>
                        @if (isset($menu->badge))
                        <?php $badgeClasses = 'badge rounded-pill badge-light-primary ms-auto me-1'; ?>
                        <span
                            class="{{ isset($menu->badgeClass) ? $menu->badgeClass : $badgeClasses }}">{{ $menu->badge }}</span>
                        @endif
                    </a>
                    @if (isset($menu->submenu))
                    @include('panels/submenu', ['menu' => $menu->submenu])
                    @endif
                </li>
                @endif
                @endforeach

            @elseif (Auth::guard('dmc')->check())

                @foreach ($menuData[7]->menu as $menu)
                @if (isset($menu->navheader))
                <li class="navigation-header">
                    <span>{{ __($menu->navheader) }}</span>
                    <i data-feather="more-horizontal"></i>
                </li>
                @else
                {{-- Add Custom Class with nav-item --}}
                @php
                $custom_classes = '';
                if (isset($menu->classlist)) {
                $custom_classes = $menu->classlist;
                }
                @endphp
                <li class="nav-item {{ $custom_classes }} {{ Route::currentRouteName() === $menu->slug ? 'active' : '' }}">
                    <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0)' }}"
                        class="d-flex align-items-center" target="{{ isset($menu->newTab) ? '_blank' : '_self' }}">
                        <i data-feather="{{ $menu->icon }}"></i>
                        <span class="menu-title text-truncate">{{ __($menu->name) }}</span>
                        @if (isset($menu->badge))
                        <?php $badgeClasses = 'badge rounded-pill badge-light-primary ms-auto me-1'; ?>
                        <span
                            class="{{ isset($menu->badgeClass) ? $menu->badgeClass : $badgeClasses }}">{{ $menu->badge }}</span>
                        @endif
                    </a>
                    @if (isset($menu->submenu))
                    @include('panels/submenu', ['menu' => $menu->submenu])
                    @endif
                </li>
                @endif
                @endforeach

                
            @elseif (Auth::guard('deeo')->check())

                @foreach ($menuData[8]->menu as $menu)
                @if (isset($menu->navheader))
                <li class="navigation-header">
                    <span>{{ __($menu->navheader) }}</span>
                    <i data-feather="more-horizontal"></i>
                </li>
                @else
                {{-- Add Custom Class with nav-item --}}
                @php
                $custom_classes = '';
                if (isset($menu->classlist)) {
                $custom_classes = $menu->classlist;
                }
                @endphp
                <li class="nav-item {{ $custom_classes }} {{ Route::currentRouteName() === $menu->slug ? 'active' : '' }}">
                    <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0)' }}"
                        class="d-flex align-items-center" target="{{ isset($menu->newTab) ? '_blank' : '_self' }}">
                        <i data-feather="{{ $menu->icon }}"></i>
                        <span class="menu-title text-truncate">{{ __($menu->name) }}</span>
                        @if (isset($menu->badge))
                        <?php $badgeClasses = 'badge rounded-pill badge-light-primary ms-auto me-1'; ?>
                        <span
                            class="{{ isset($menu->badgeClass) ? $menu->badgeClass : $badgeClasses }}">{{ $menu->badge }}</span>
                        @endif
                    </a>
                    @if (isset($menu->submenu))
                    @include('panels/submenu', ['menu' => $menu->submenu])
                    @endif
                </li>
                @endif
                @endforeach

            @elseif (Auth::guard('di')->check())

                @foreach ($menuData[9]->menu as $menu)
                @if (isset($menu->navheader))
                <li class="navigation-header">
                    <span>{{ __($menu->navheader) }}</span>
                    <i data-feather="more-horizontal"></i>
                </li>
                @else
                {{-- Add Custom Class with nav-item --}}
                @php
                $custom_classes = '';
                if (isset($menu->classlist)) {
                $custom_classes = $menu->classlist;
                }
                @endphp
                <li class="nav-item {{ $custom_classes }} {{ Route::currentRouteName() === $menu->slug ? 'active' : '' }}">
                    <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0)' }}"
                        class="d-flex align-items-center" target="{{ isset($menu->newTab) ? '_blank' : '_self' }}">
                        <i data-feather="{{ $menu->icon }}"></i>
                        <span class="menu-title text-truncate">{{ __($menu->name) }}</span>
                        @if (isset($menu->badge))
                        <?php $badgeClasses = 'badge rounded-pill badge-light-primary ms-auto me-1'; ?>
                        <span
                            class="{{ isset($menu->badgeClass) ? $menu->badgeClass : $badgeClasses }}">{{ $menu->badge }}</span>
                        @endif
                    </a>
                    @if (isset($menu->submenu))
                    @include('panels/submenu', ['menu' => $menu->submenu])
                    @endif
                </li>
                @endif
                @endforeach

            @elseif (Auth::guard('beeo')->check())

                @foreach ($menuData[10]->menu as $menu)
                @if (isset($menu->navheader))
                <li class="navigation-header">
                    <span>{{ __($menu->navheader) }}</span>
                    <i data-feather="more-horizontal"></i>
                </li>
                @else
                {{-- Add Custom Class with nav-item --}}
                @php
                $custom_classes = '';
                if (isset($menu->classlist)) {
                $custom_classes = $menu->classlist;
                }
                @endphp
                <li class="nav-item {{ $custom_classes }} {{ Route::currentRouteName() === $menu->slug ? 'active' : '' }}">
                    <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0)' }}"
                        class="d-flex align-items-center" target="{{ isset($menu->newTab) ? '_blank' : '_self' }}">
                        <i data-feather="{{ $menu->icon }}"></i>
                        <span class="menu-title text-truncate">{{ __($menu->name) }}</span>
                        @if (isset($menu->badge))
                        <?php $badgeClasses = 'badge rounded-pill badge-light-primary ms-auto me-1'; ?>
                        <span
                            class="{{ isset($menu->badgeClass) ? $menu->badgeClass : $badgeClasses }}">{{ $menu->badge }}</span>
                        @endif
                    </a>
                    @if (isset($menu->submenu))
                    @include('panels/submenu', ['menu' => $menu->submenu])
                    @endif
                </li>
                @endif
                @endforeach

            @elseif (Auth::guard('chd')->check())

                @foreach ($menuData[11]->menu as $menu)
                @if (isset($menu->navheader))
                <li class="navigation-header">
                    <span>{{ __($menu->navheader) }}</span>
                    <i data-feather="more-horizontal"></i>
                </li>
                @else
                {{-- Add Custom Class with nav-item --}}
                @php
                $custom_classes = '';
                if (isset($menu->classlist)) {
                $custom_classes = $menu->classlist;
                }
                @endphp
                <li class="nav-item {{ $custom_classes }} {{ Route::currentRouteName() === $menu->slug ? 'active' : '' }}">
                    <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0)' }}"
                        class="d-flex align-items-center" target="{{ isset($menu->newTab) ? '_blank' : '_self' }}">
                        <i data-feather="{{ $menu->icon }}"></i>
                        <span class="menu-title text-truncate">{{ __($menu->name) }}</span>
                        @if (isset($menu->badge))
                        <?php $badgeClasses = 'badge rounded-pill badge-light-primary ms-auto me-1'; ?>
                        <span
                            class="{{ isset($menu->badgeClass) ? $menu->badgeClass : $badgeClasses }}">{{ $menu->badge }}</span>
                        @endif
                    </a>
                    @if (isset($menu->submenu))
                    @include('panels/submenu', ['menu' => $menu->submenu])
                    @endif
                </li>
                @endif
                @endforeach

            @elseif (Auth::guard('bmc')->check())

                @foreach ($menuData[12]->menu as $menu)
                @if (isset($menu->navheader))
                <li class="navigation-header">
                    <span>{{ __($menu->navheader) }}</span>
                    <i data-feather="more-horizontal"></i>
                </li>
                @else
                {{-- Add Custom Class with nav-item --}}
                @php
                $custom_classes = '';
                if (isset($menu->classlist)) {
                $custom_classes = $menu->classlist;
                }
                @endphp
                <li class="nav-item {{ $custom_classes }} {{ Route::currentRouteName() === $menu->slug ? 'active' : '' }}">
                    <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0)' }}"
                        class="d-flex align-items-center" target="{{ isset($menu->newTab) ? '_blank' : '_self' }}">
                        <i data-feather="{{ $menu->icon }}"></i>
                        <span class="menu-title text-truncate">{{ __($menu->name) }}</span>
                        @if (isset($menu->badge))
                        <?php $badgeClasses = 'badge rounded-pill badge-light-primary ms-auto me-1'; ?>
                        <span
                            class="{{ isset($menu->badgeClass) ? $menu->badgeClass : $badgeClasses }}">{{ $menu->badge }}</span>
                        @endif
                    </a>
                    @if (isset($menu->submenu))
                    @include('panels/submenu', ['menu' => $menu->submenu])
                    @endif
                </li>
                @endif
                @endforeach


            @endif


            @endif
            {{-- Foreach menu item ends --}}
        </ul>
    </div>
</div>
<!-- END: Main Menu-->