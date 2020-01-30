@extends('master.layout')

@section('body')
    <div class="main_content with_sidebar">
        <div>
            <div>
                <h1>@yield('title')</h1>
                @yield('container')
            </div>
            
        </div>
    </div>
@endsection