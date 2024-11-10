@extends('layouts.sideNav')

@section('head')
<style>
    .suggestions-box {
        position: absolute;
        z-index: 10;
        width: 100%;
        border: 1px solid #ddd;
        background: #fff;
        max-height: 200px;
        overflow-y: auto;
        display: none;
    }

    .suggestion-item {
        padding: 8px;
        cursor: pointer;
    }

    .suggestion-item:hover {
        background-color: #f0f0f0;
    }

</style>
@endsection

@section('content')
    @can('product_list')
    @include('components.product.product_list')
    @include('components.product.product_create')
    @include('components.product.product_update')
    @endcan
@endsection

@section('footer_script')
    @include('components.product.product_js')
@endsection