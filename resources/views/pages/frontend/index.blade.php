@extends('layouts.master')

@php
$seo = App\Models\SEO::where('slug', 'home')->first();
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
@else
<title>Home</title>
@endif

@endsection

@section('content')
<!-- ===================================
          Product part start
  ==================================== -->

{{-- marque tag --}}
<div style="font-size: 1.5em; color: red;  padding: 10px; border-radius: 5px;">
    <marquee behavior="scroll" direction="left" scrollamount="5" scrolldelay="80" loop="infinite">
        @php
        $slide = App\Models\WebContent::where('id', 1)->first()
        @endphp
        {{$slide->slide}}
    </marquee>
</div>

<section id="products" style="padding-top: 0;">
    <div class="container">

        <div class="title">
            <h2>Recent Products</h2>
        </div>
        <div class="row product_row">
            @forelse ($products as $product)
            <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                <div class="pro_col">
                    <div class="pro_img_1">
                        <a href="{{url('single-product/' . $product->slug)}}">
                            <img class="w-100 img-fluid" src="{{asset('upload/product/preview')}}/{{$product->preview}}"
                                alt="a">
                        </a>
                    </div>
                    <div class="pro_text">
                        <h3><a href="{{url('single-product/' . $product->slug)}}">{{$product->product_name}}</a></h3>
                    </div>
                </div>
            </div>
            @empty
            <div class="row">
                <div class="col-lg-6 m-auto text-center">
                    <h3 class="text-danger mt-5" style="font-size: 40px; font-weight: 700;">Opps! No Product Found!</h3>
                    <a class="mt-3" href="{{url('/')}}">Go to Home page</a>
                </div>
            </div>
            @endforelse
        </div>
        <div class="home_product">
            {{$products->links()}}
        </div>
    </div>
</section>
@endsection
