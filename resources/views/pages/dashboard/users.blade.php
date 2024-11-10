@extends('layouts.sideNav')

@section('content')
    @can('user_list')
    @include('components.users.user_list')
    @include('components.users.user_create')
    @endcan
@endsection

@section('footer_script')
    @include('components.users.user_js')
@endsection
