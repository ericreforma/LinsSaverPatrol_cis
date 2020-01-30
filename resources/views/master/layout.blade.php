@extends('master.index')

@section('content')
    @yield('modal')
    @include('master.topbar')
    @include('master.navigation')
    @yield('body')

@endsection