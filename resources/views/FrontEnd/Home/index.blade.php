@extends('layouts.FrontEnd.master')
@push('styles')

@endpush
@section('content')
    @include('layouts.FrontEnd.header')

    <!-- START SECTION BANNER -->
    @if(isset($sliders_main))
        <div class="banner_section slide_medium shop_banner_slider staggered-animation-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 offset-lg-3">
                        <div class="carousel slide light_arrow" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($sliders_main as $slider)
                                    <div class="carousel-item {{$loop->first?'active':null}} background_bg"
                                         id="{{$slider->id}}" data-img-src="{{$slider->image}}">
                                        <div class="banner_slide_content banner_content_inner">
                                            <div class="col-lg-8 col-10">
                                                <div class="banner_content overflow-hidden">
                                                    <h2 class="text-white staggered-animation"
                                                        data-animation="slideInRight"
                                                        data-animation-delay="1s">{{$slider->title}}</h2>
                                                    <a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase"
                                                       href="{{$slider->link}}" data-animation="slideInRight"
                                                       data-animation-delay="1.5s">اکنون خرید کنید</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- END SECTION BANNER -->
    <!-- START SECTION SHOP -->
    @foreach($categories as $category)
        <div class="section small_pb">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="heading_tab_header">
                            <div class="heading_s2">
                                <h2>{{$category->title}}</h2>
                            </div>
                            <div class="tab-style2">
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#{{$category->id}}" aria-expanded="false">
                                    <span class="ion-android-menu"></span>
                                </button>
                                <ul class="nav nav-tabs justify-content-center justify-content-md-end"
                                    id="{{$category->id}}"
                                    role="tablist">
                                    @foreach($category->Children as $subCategory)
                                        <li class="nav-item">
                                            <a class="nav-link {{$loop->first?'active':null}}" id="arrival-tab"
                                               data-toggle="tab"
                                               href="#{{$subCategory->id}}" role="tab" aria-controls="arrival"
                                               aria-selected="true">{{$subCategory->title}}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="tab_slider">
                                    <div class="tab-pane fade {{$loop->first?'show active':null}}"
                                         id="{{$subCategory->id}}"
                                         role="tabpanel"
                                         aria-labelledby="arrival-tab">
                                        <div class="product_slider carousel_slider owl-carousel owl-theme nav_style1"
                                             data-loop="false" data-dots="false" data-nav="true" data-margin="20"
                                             data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                                            @foreach($products as $product)
                                                <div class="item">
                                                    <div class="product">
                                                        <div class="product_img">
                                                            <a href="{{$product->subcategory_id}}">
                                                                <img src="{{$product->image}}"
                                                                     alt="پرینتر{{$product->image}}">
                                                            </a>
                                                        </div>
                                                        <div class="product_info">
                                                            <h6 class="product_title"><a
                                                                    href="{{route('FrontEnd.product.show',$product->id)}}">{{$product->title}}
                                                                </a></h6>
                                                            <div class="product_price">
                                                                <span class="price">{{$product->price}} تومان</span>
                                                                {{--                                                            <del>55000 تومان</del>--}}
                                                                {{--                                                            <div class="on_sale">--}}
                                                                {{--                                                                <span>٪35 تخفیف</span>--}}
                                                                {{--                                                            </div>--}}
                                                            </div>
                                                            <div class="rating_wrap">
                                                                <div class="rating">
                                                                    <div class="product_rate" style="width:80%"></div>
                                                                </div>
                                                                {{--                                                            <span class="rating_num">(21)</span>--}}
                                                            </div>
                                                            <div class="pr_desc">
                                                                <p>{{$product->description}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <!-- END SECTION SHOP -->
    <!-- START SECTION BANNER -->
    {{--    <div class="section pb_20 small_pt">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-6">--}}
    {{--                    <div class="single_banner">--}}
    {{--                        <img src="assets/images/shop_banner_img1.jpg" alt="shop_banner_img1">--}}
    {{--                        <div class="single_banner_info">--}}
    {{--                            <h5 class="single_bn_title1">فروش فوق العاده</h5>--}}
    {{--                            <h3 class="single_bn_title">مجموعه جدید</h3>--}}
    {{--                            <a href="shop-left-sidebar.html" class="single_bn_link">اکنون خرید کنید</a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-md-6">--}}
    {{--                    <div class="single_banner">--}}
    {{--                        <img src="assets/images/shop_banner_img2.jpg" alt="shop_banner_img2">--}}
    {{--                        <div class="single_banner_info">--}}
    {{--                            <h3 class="single_bn_title">فصل جدید</h3>--}}
    {{--                            <h4 class="single_bn_title1">٪40 تخفیف</h4>--}}
    {{--                            <a href="shop-left-sidebar.html" class="single_bn_link">اکنون خرید کنید</a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <!-- END SECTION BANNER -->

    <!-- START SECTION CLIENT LOGO -->
    <div class="section small_pt">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading_tab_header">
                        <div class="heading_s2">
                            <h2>برندهای ما</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="client_logo carousel_slider owl-carousel owl-theme nav_style3" data-dots="false"
                         data-nav="true" data-margin="30" data-loop="true" data-autoplay="true"
                         data-responsive='{"0":{"items": "2"}, "480":{"items": "3"}, "767":{"items": "4"}, "991":{"items": "5"}}'>
                        @foreach($brands as $brand)
                            <div class="item">
                                <div class="cl_logo">
                                    <img src="{{$brand->image}}" alt="cl_logo"/>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION CLIENT LOGO -->

    <!-- START SECTION SUBSCRIBE NEWSLETTER -->
    <div class="section bg_dark small_pt small_pb">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="heading_s1 mb-md-0 heading_light">
                        <h3>اشتراک در خبرنامه ما</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="newsletter_form">
                        <form action="{{route('FrontEnd.pages.email-notice')}}" method="POST">
                            @csrf
                            <input name="email" type="text" required="" class="form-control rounded-0"
                                   placeholder="آدرس ایمیل خود را وارد کنید">
                            <button type="submit" class="btn btn-fill-out rounded-0" name="submit" value="Submit">
                                اشتراک
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- START SECTION SUBSCRIBE NEWSLETTER -->


    <!-- END MAIN CONTENT -->
@endsection
@push('scripts')

@endpush
