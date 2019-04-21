@extends('mail::layout')

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{!! trans('laravel-user-verification::user-verification.verification_error_header') !!}</div>
                <div class="panel-body">
                    <span class="help-block">
                        <strong>{!! trans('laravel-user-verification::user-verification.verification_error_message') !!}</strong>
                    </span>
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{{url('/')}}" class="btn btn-primary">
                                {!! trans('laravel-user-verification::user-verification.verification_error_back_button') !!}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@extends('mail::layout')
{{-- Header --}}
@slot('header')
@extends('mail::header', ['url' => config('app.url')])
{{ config('app.name') }}
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
&copy; {{ date('Y') }} {{ config('app.name') }}. 版本所有。
@endcomponent
@endslot
@endcomponent
