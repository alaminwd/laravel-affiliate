@extends('layouts.sideNav')

@section('content')
    @can('dynamic_page')
    @include('components.dynamicPage.page_create')
    @include('components.dynamicPage.page_list')
    @include('components.dynamicPage.page_update')
    @endcan
@endsection

@section('footer_script')
@include('components.dynamicPage.page_js')
@endsection