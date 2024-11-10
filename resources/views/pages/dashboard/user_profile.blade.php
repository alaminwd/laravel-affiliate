@extends('layouts.sideNav')

@section('content')
    @include('components.users.profile')
@endsection

@section('footer_script')
    @include('components.users.user_js')
@endsection
