@extends('layouts.sideNav')

@section('content')
    @can('seo_page')
    @include('components.seo.seo_create')
    @include('components.seo.seo_list')
    @include('components.seo.seo_update')
    @endcan
@endsection
    
@section('footer_script')
    @include('components.seo.seo_js')
@endsection