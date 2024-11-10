@extends('layouts.sideNav')

@section('content')
    @can('message_list')
    @include('components.message.message_list')
    @endcan
@endsection

@section('footer_script')
    @include('components.message.message_js')
@endsection