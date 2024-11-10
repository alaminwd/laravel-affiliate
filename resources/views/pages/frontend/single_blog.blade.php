@extends('layouts.master')

@php
    $seo = App\Models\SEO::where('slug', $blog->slug)->first();
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
<!-- ================================
        Blog Details area start
====================================-->
<section id="post1" class="mt-3 ">
    <div class="post_wrap">
        <div class="container">
            <div class="bradecrumb-main" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/blog')}}">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$blog->title}}</li>
                </ol>
            </div>
            <div class="p_post">
                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <div class="p_main_left">
                            <div class="p_left1">
                                <div class="p_left1_img">
                                    <img class="w-100 img-fluid" src="{{asset('upload/blog')}}/{{$blog->img}}"
                                        alt="blog">
                                </div>
                                <span>Date -<a class="sa" href="#">{{$blog->created_at->format('d--Y')}}</a></span>
                            </div>
                            <div class="p_left2">
                                <h2>{{$blog->title}}</h2>
                                <div class="blog_summernote">
                                    {!!$blog->desp!!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5">
                        <div class="recent_pst_section">
                            <div class="blog_title">
                                <h3>Recent Post</h3>
                            </div>

                            @foreach (App\Models\Blog::latest()->take(3)->get() as $recent_blog)
                            <div class="post_item">
                                <div class="thumb">
                                    <a href="{{url('single-blog/' . $recent_blog->slug)}}"><img
                                            src="{{asset('upload/blog')}}/{{$recent_blog->img}}" alt=""></a>
                                </div>
                                <div class="content">
                                    <span class="date"><i
                                            class="far fa-calendar"></i>{{$recent_blog->created_at->format('d-M-Y')}}</span>
                                    <h2>
                                        <a
                                            href="{{url('single-blog/' . $recent_blog->slug)}}">{{$recent_blog->title}}</a>
                                    </h2>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
