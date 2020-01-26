@extends('master.layout')

@section('body')
    <div class="main_content">
        <div>
            <h1>@yield('title')</h1>
            @yield('container')
        </div>
    </div>
@endsection