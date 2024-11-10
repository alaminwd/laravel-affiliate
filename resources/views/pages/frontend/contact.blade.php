@extends('layouts.master')

@php
    $seo = App\Models\SEO::where('slug', 'contact')->first();
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
    <title>Contact Us</title>
@endif
 
@endsection

@section('content')
   <!-- ===================================
            contact part start
    ==================================== -->
    <section id="contact-section">
        <div class="container">
            <div class="bradecrumb-main" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-lg-5 col-md-6 m-auto">
                    <div class="contact-content">
                        <div class="contact-title">

                            <span>GET IN TOUCH</span>
                            <h2 id="contact_title"></h2>
                        </div>
                        <p id="contact_desp"></p>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-12">
                    <form id="contactForm">

                        <div class="mt-3">
                            <input type="text" id="name" class="form-control" placeholder="Name*">
                        </div>
                        <div class="mt-3">
                            <input type="email" class="form-control" id="email" placeholder="Email*">
                        </div>
                        <div class="mt-3">
                            <textarea id="desp" class="form-control" style="resize: none; height: 100px;"
                                placeholder="Message *"></textarea>
                        </div>

                        <div class="mt-4">
                            <button type="button" class="send_msg" class="btn w-100">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
