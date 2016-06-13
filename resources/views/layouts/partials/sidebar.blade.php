<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li style="margin-left:20px;">
            <img src="{{ Auth::user()->getAvatarUrl() }}" height="50" width="50" style="border-radius:25px;" />
        </li>
        <li><a href="#"> @ {{ Auth::user()->username }}</a></li>
        {{--<li class="active"><a href="#">PMHB<span class="sr-only">(current)</span></a></li>--}}
        <li class="active"><a href="{{ route('projects.index') }}">Projects<span class="sr-only">(current)</span></a></li>
        {{--<li><a href="#">Todos</a></li>--}}
    </ul>
    <ul class="nav nav-sidebar">
        <li><a href="{{ route('auth.logout') }}">Sign Out</a></li>
    </ul>
</div>