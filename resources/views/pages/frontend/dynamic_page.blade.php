@extends('layouts.master')

@php
    $seo = App\Models\SEO::where('slug', $page->slug)->first();
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

    <section id="about_page">
        <div class="title abt-ti"  style="background: url({{asset('frontend/images/banner-2.png')}})no-repeat center;">
            <div class="overlay">
                <h2>{{$page->title}}</h2>
            </div>
        </div>
        <div class="container">
            <div class="bradecrumb-main" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$page->title}}</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="about-desp">
                        <div class="about-title">
                            <h2> {{$page->title}}</h2>
                        </div>
                        <p class="short-desp">
                            {{$page->short_desp}}
                        </p>
                    </div>
                    <div class="details blog_summernote" >
                       {!! $page->desp !!}
                    </div>
                </div>
            </div>
            
        </div>
    </section>
@endsection