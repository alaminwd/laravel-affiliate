@extends('layouts.sideNav')

@section('content')
    @can('web_content')
    @include('components.webContent.update_web_content')
    @endcan
@endsection

@section('footer_script')
    @include('components.webContent.web_content_js')
@endsection