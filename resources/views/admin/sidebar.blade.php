<?php //SIDEBAR TOGGLE BUTTON ?>
<nav class="navbar navbar-expand-lg sidebar-toggler visible-xs visible-sm">
    <div class="container-fluid padding_fix">

        <button type="button" id="sidebarCollapse" class="btn btn-info" style="border-bottom-left-radius: 0px; border-top-left-radius: 0px;">
            <i class="fa fa-align-left"></i>
        </button>
    </div>
</nav>
<?php //TOGGLE BUTTON END ?>

<div class="sidebar-header text-center">
    <h3>almono's CMS application</h3>
</div>
<ul class="list-unstyled components admin-sidebar">
    @if(Auth::check())
        <li class="text-center" style="height: 150px; padding: 10px;">
            Logged as: <br>
            {{ Auth::user()->username }}
        </li>
        <li class="active">
            <a href="{{ route('admin') }}">Home</a>
        </li>
        <li>
            <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Models management</a>
            <ul class="collapse list-unstyled" id="pageSubmenu2">
                <li>
                    <a href="{{ route('users.index') }}">Users</a>
                </li>
                <li>
                    <a href="{{ route('roles.index') }}">Roles</a>
                </li>
                <li>
                    <a href="{{ route('abilities.index') }}">Abilities</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Content management</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="{{ route('menu.index') }}">Menu</a>
                </li>
                <li>
                    <a href="{{ route('pages.index') }}">Pages</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">Slider</a>
        </li>
        <li>
            <a href="#">SEO</a>
        </li>
        <li>
            <a href="#">Settings</a>
        </li>
        <li>
            <a href="{{ route('admin_logout') }}">Log out</a>
        </li>
    @endif
</ul>