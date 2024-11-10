@extends('layouts.master')

@php
    $seo = App\Models\SEO::where('slug', $product_info->slug)->first();
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

<link rel="stylesheet" href="{{asset('frontend/css/venobox.min.css')}}">
 
@endsection

@section('content')
     <!-- ===================================
            single part start
    ==================================== -->

    <section id="allimg">
        <div class="container">
            <div class="bradecrumb-main" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$product_info->product_name}}</li>
                </ol>
            </div>
            <div class="img_row">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="img_l_top1">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="swiper mySwiper2">
                                        <div class="swiper-wrapper">
                                            
                                            @if ($galleries->count()> 0)
                                                @foreach ($galleries as $gallery)
                                                <div class="swiper-slide">
                                                    <a href="{{asset('upload/product/gallery')}}/{{$gallery->gallery}}" class="my-image-links" data-gall="gallery01" style="width: 100%; height: 100%;">
                                                        <img class="w-100 img-fluid"
                                                        src="{{asset('upload/product/gallery')}}/{{$gallery->gallery}}" />
                                                    </a>
                                                </div>
                                                @endforeach
                                            @else
                                                <div class="swiper-slide">
                                                    <a href="{{asset('upload/product/preview')}}/{{$product_info->preview}}" class="my-image-links" data-gall="gallery01" style="width: 100%; height: 100%;">
                                                        <img id="NZoomImg" data-NZoomscale="2" class="w-100 img-fluid"
                                                        src="{{asset('upload/product/preview')}}/{{$product_info->preview}}" />
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                    <div thumbsSlider="" class="swiper mySwiper">
                                        <div class="swiper-wrapper">
                                            
                                            @if ($galleries->count()> 0)
                                            @foreach ($galleries as  $gal)
                                            <div class="swiper-slide">
                                                <img src="{{asset('upload/product/gallery')}}/{{$gal->gallery}}" alt="">
                                            </div>
                                            @endforeach
                                            @else
                                                <div class="swiper-slide">
                                                    <img src="{{asset('upload/product/preview')}}/{{$product_info->preview}}" alt="">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="img_top_left">
                                        <h3>{{$product_info->product_name}}</h3>
                                    </div>
                                    <a class='pro_btn' href="{{$product_info->product_link}}" target="_blank">Buy Now</a>
                                    <a class='pro_btn' href="{{$product_info->product_link2}}" target="_blank"> Telegram</a>
                                    <a class='pro_btn' href="{{$product_info->product_link3}}" target="_blank"> Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="right_content d-md-block d-none">
                            <h5 class="recomm">Blogs</h5>
                            @foreach ($blogs as $blog)
                            <div class="samiller_item">
                                <a href="{{url('single-blog/' . $blog->slug)}}">
                                    <div class="product_img">
                                        <img src="{{asset('upload/blog/')}}/{{$blog->img}}" class="img-fluid" width="150" alt="">
                                    </div>
                                    <p>{{$blog->title}}</p>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================================
        Macting Product
    ================================= -->
    <section id="products">
        <div class="container">
            <div class="title">
                <h2>Matching Product</h2>
            </div>
            <div class="row">
                @forelse ($related_products as $product)
                <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                    <div class="pro_col">
                        <div class="pro_img_1">
                            <a href="{{url('single-product/'. $product->slug)}}">
                                <img class="w-100 img-fluid" src="{{asset('upload/product/preview')}}/{{$product->preview}}" alt="a">
                            </a>
                        </div>
                        <div class="pro_text">
                            <h3><a href="{{url('single-product/'. $product->slug)}}">{{$product->product_name}}</a></h3>
                        </div>
                    </div>
                </div> 
                @empty
                <p class="text-danger">No Matchig Product Here</p>
                @endforelse
            </div>
            <div class="home_product">
                {{$related_products->links()}}
            </div>
        </div>
    </section>
@endsection

@section('footer_script')
<script src="{{asset('frontend/js/venobox.min.js')}}"></script>
<script src="{{asset('frontend/js/swiper-bundle.min.js')}}"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper,
        },
    });
</script>
<script>
    // Venobox
	new VenoBox({
		selector: '.my-image-links',
		numeration: true,
		infinigall: true,
		share: true,
		spinner: 'rotating-plane'
	});
</script>
@endsection