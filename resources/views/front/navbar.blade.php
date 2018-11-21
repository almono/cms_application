<?php $menu = \App\Menu::getMenu(); ?>
<nav class="navbar navbar-inverse navbar-front" style="background-color: #222">
    <div class="container padding_fix">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand visible-xs visible-sm" href="#">Brand</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @foreach($menu as $m)
                    @if(isset($m["child"]) && !is_null($m["child"]) && count($m["child"]) > 0)
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $m["menu_name"] }}<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @foreach($m["child"] as $child)
                                    <li><a @if(is_null($child["menu_url"])) href="#" @else href="{{ $child["menu_url"] }}" @endif>{{ $child["menu_name"] }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li><a @if(is_null($m["menu_url"])) href="#" @else href="{{ $m["menu_url"] }}" @endif>{{ $m["menu_name"] }}</a></li>
                    @endif
                @endforeach
            </ul>
            <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" style="max-width: 200px;">
                </div>
                <button type="submit" class="btn btn-default" style="margin-left: -10px;"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
</nav>