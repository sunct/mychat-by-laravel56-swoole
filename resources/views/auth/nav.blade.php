@if (Auth::check())
    <a class="dropdown-item" href="#">{{ Auth::user()->name }}</a>
    <a class="dropdown-item" href="/logout">登出</a>
    @if (is_null(Auth::user()->activations) || Auth::user()->activations->active == 0)
        <a class="dropdown-item" href="/sendActiveMail">发送激活邮件</a>
    @endif
@else
