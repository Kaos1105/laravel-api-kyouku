<!-- As a heading -->
<nav class="navbar navbar-light bg-light">
    <span class="navbar-brand mb-0 h1">アドミン管理画面</span>
    <span class="navbar-brand m-0 h1">{{ Auth::user()->username }}</span>
</nav>
<div class="form-group">
    <ul class="nav nav-tabs d-inline-block">
        <li class="nav-item d-inline-block">
            <a class="nav-link {{(request()->segment(1) === 'users') ? 'active' : ''}}"
               href="{{route('users.index')}}">ユーザー管理</a>
        </li>
        @if(Auth::user()->is_super_admin)
            <li class="nav-item d-inline-block">
                <a class="nav-link {{(request()->segment(1) === 'admins') ? 'active' : ''}}"
                   href="{{route('admins.index')}}">アドミン管理</a>
            </li>
        @endif
    </ul>
    <div style="right: 0;" class="d-inline-block position-absolute">
        <a style="font-size:16px" class="form-control btn btn-link text-md-right w-auto"
           role="button"
           href="{{ route('logout') }}"
           onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
            {{ __('ログアウト') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>