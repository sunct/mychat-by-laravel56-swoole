
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header ">邮箱验证成功</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                            <div class="text-center">
                                <h1 class="text-success">邮箱验证成功！</h1>
                                <div class="">  {{ Auth::user()->name }}, 欢迎成为 本站 的会员</div>
                            </div>
                        <a class="nav-link text-info text-center" href="{{ route('home') }}">首页</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
