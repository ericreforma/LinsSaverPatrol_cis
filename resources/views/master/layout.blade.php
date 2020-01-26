@extends('master.index')

@section('content')

    @include('master.topbar')
    @include('master.navigation')
    @yield('body')

@endsection