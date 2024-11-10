@extends('layouts.master')

@php
$seo = App\Models\SEO::where('slug', $category_info->slug)->first();
@endphp
@section('header')

@if ($seo)
<meta name="Developed By" content="{{$seo->author}}">
<title>{{$seo->title}}</title>
<meta name="title" content="{{$seo->title}}">
<meta name="description" content="{{$seo->desp}}">
<meta name="keywords" content="{{$seo->keywords}}">
<link rel="canonical" href="{{$seo->canonical}}">
<meta property="og:title" content="{{$seo->title}}">
<meta property="og:description" content="{{$seo->desp}}">
<meta property="og:type" content="{{$seo->og_type}}">
<meta property="og:locale" content="{{$seo->og_locale}}">
<meta property="og:url" content="{{$seo->og_url}}">
<meta property="og:image:url" content="{{asset('upload/seo')}}/{{$seo->img}}">
<meta property="og:image" content="{{asset('upload/seo')}}/{{$seo->img}}">
<meta property="article:published_time" content="{{$seo->published_time}}">
<meta property="article:modified_time" content="{{$seo->modified_time}}">
<link rel="image_src" href="{{asset('upload/seo')}}/{{$seo->img}}" />
<meta name="twitter:card" content="{{$seo->twitter_card}}" />
<meta name="twitter:site" content="{{$seo->twitter_site}}" />
<meta name="twitter:label1" content="{{$seo->twitter_label}}" />
<meta name="twitter:data1" content="{{$seo->twitter_data}}" />
@endif

@endsection

@section('content')
<!-- ===================================
            contact part start
    ==================================== -->

<section id="categories" class="mb-5">
    <div class="title abt-ti" style="background: url({{asset('frontend/images/banner-2.png')}})no-repeat center;">
        <div class="overlay">
            <h2>{{$category_info->category_name}}</h2>
        </div>
    </div>
    <div class="container">
        <div class="bradecrumb-main" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$category_info->category_name}}</li>
            </ol>
        </div>
        <div class="row ">
            <div class="col-lg-3">
                <div class="category_list d-none d-lg-block">
                    <h6>Categories</h6>
                    <ul class="list-group">
                        @foreach (App\Models\Category::all() as $category)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{url('single-category/' . $category->slug)}}"
                                class="text-decoration-none">{{$category->category_name}}</a>
                            <span
                                class="badge rounded-pill">{{App\Models\Product::where('category_id', $category->id)->count()}}</span>
                        </li>
                        @endforeach
                    </ul>

                </div>
                <div class="dropdown d-block d-lg-none">
                    <a class="dropdown-toggle choose-option" href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Select Categories
                    </a>

                    <ul class="dropdown-menu " aria-labelledby="dropdownMenuLink">
                        @foreach (App\Models\Category::all() as $category)
                        <li><a class="dropdown-item" href="{{url('single-category/' . $category->slug)}}">
                                {{$category->category_name}} </a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    @forelse ($products as $product)
                    <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                        <div class="pro_col">
                            <div class="pro_img_1">
                                <a href="{{url('single-product/'. $product->slug)}}">
                                    <img class="w-100 img-fluid"
                                        src="{{asset('upload/product/preview')}}/{{$product->preview}}" alt="a">
                                </a>
                            </div>
                            <div class="pro_text">
                                <h3><a href="{{url('single-product/'. $product->slug)}}">{{$product->product_name}}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="row">
                        <div class="col-lg-8 m-auto text-center">
                            <h3 class="text-danger mt-5" style="font-size: 40px; font-weight: 700;">Opps! No Product
                                Found!</h3>
                            <a class="mt-3" href="{{url('/')}}">Go to Home page</a>
                        </div>
                    </div>
                    @endforelse
                </div>
                <div class="home_product">
                    {{$products->links()}}
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
