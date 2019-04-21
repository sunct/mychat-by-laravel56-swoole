@extends('layouts.app')

@section('content')


    <div class="container">
        @if (Auth::user()->verified ==0)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-success">
                                该账户还未进行邮箱认证，请先去邮箱完成认证操作，如未收到邮件，请点此
                                <a class="text-danger" href="{{ route('emailVerify') }}"
                                   onclick="event.preventDefault(); document.getElementById('emailVerify-form').submit();">
                                    重新发送
                                </a>
                                。
                                <form id="emailVerify-form" action="{{ route('emailVerify') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                @include('sweet::alert')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        this is your home!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
