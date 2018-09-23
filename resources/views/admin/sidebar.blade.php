<?php //SIDEBAR TOGGLE BUTTON ?>
<nav class="navbar navbar-expand-lg sidebar-toggler visible-xs visible-sm">
    <div class="container-fluid padding_fix">

        <button type="button" id="sidebarCollapse" class="btn btn-info" style="border-bottom-left-radius: 0px; border-top-left-radius: 0px;">
            <i class="fa fa-align-left"></i>
        </button>
    </div>
</nav>
<?php //TOGGLE BUTTON END ?>

<div class="sidebar-header">
    <h3>almono's CMS application</h3>
</div>
<ul class="list-unstyled components">
    @if(Auth::check())
        <li class="text-center" style="height: 150px; padding: 10px;">
            User info
        </li>
        <li class="active">
            <a href="{{ route('home') }}">Home</a>
        </li>
        <li>
            <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Models management</a>
            <ul class="collapse list-unstyled" id="pageSubmenu2">
                <li>
                    <a href="{{ url('/users') }}">Users</a>
                </li>
                <li>
                    <a href="{{ url('/roles') }}">Roles</a>
                </li>
                <li>
                    <a href="{{ url('/abilities') }}">Abilities</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">Portfolio</a>
        </li>
        <li>
            <a href="#">Log out</a>
        </li>
    @endif
</ul>