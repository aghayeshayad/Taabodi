@extends('layouts.FrontEnd.master')
@section('title')
    {{ $product->title }}
@endsection
@section('meta_description')
    <meta name="description" content="فروش لوازم دندان پزشکی">
@endsection
@push('styles')
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/linearicons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/simple-line-icons.css')}}">
    <!--- owl carousel CSS-->
    <link rel="stylesheet" href="{{asset('assets/owlcarousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/owlcarousel/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/owlcarousel/css/owl.theme.default.min.css')}}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <!-- jquery-ui CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slick-theme.css')}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <!-- RTL CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/rtl-style.css')}}">
@endpush
@section('content')
    @include('layouts.FrontEnd.headerFix')

    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>جزئیات محصول {{$product->title}}</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="{{route('FrontEnd.home.index')}}">خانه</a></li>
                        <li class="breadcrumb-item"><a href="{{route('FrontEnd.product.list')}}">صفحات</a></li>
                        <li class="breadcrumb-item active">جزئیات محصول {{$product->title}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="section p-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                    <div class="product-image">
                        <div class="product_img_box">
                            <img id="product_img" src='{{$product->image}}'
                                 data-zoom-image="{{$product->image}}" alt="product_img1"/>
                            <a href="{{$product->image}}" class="product_img_zoom" title="Zoom">
                                <span class="linearicons-zoom-in"></span>
                            </a>
                        </div>
                        <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4"
                             data-slides-to-scroll="1" data-infinite="true">
                            @foreach($product->images as $image)
                                <div class="item">
                                    <a href="{{$product->image}}"
                                       class="product_gallery_item {{$loop->first?'active':null}}"
                                       data-image="{{asset("uploads/products/images/$image")}}"
                                       data-zoom-image="{{asset("uploads/products/images/$image")}}">
                                        <img src="{{asset("uploads/products/images/$image")}}"
                                             alt="product_small_img1"/>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="pr_detail">
                        <div class="product_description">
                            <h4 class="product_title">لباس آبی زنانه</h4>
                            <div class="product_price">
                                <span class="price">{{$product->price}} تومان</span>
                                {{--                                <del>55000 تومان</del>--}}
                                {{--                                <div class="on_sale">--}}
                                {{--                                    <span>٪35 تخفیف</span>--}}
                                {{--                                </div>--}}
                            </div>
                   <br>
                   <br>
                   <br>
                            <div class="product_sort_info">
                                @foreach($product->Informations->information as $key=>$value)
                                    <li><i class="linearicons-shield-check"></i>
                                        @if($key<=4)
                                            <span>{{$value->title}}</span>:
                                            <span>{{$value->value}}</span>.
                                        @endif
                                    </li>
                                @endforeach
                            </div>
                        </div>
                        <hr/>
                        <div class="cart_extra">
                            <div class="cart_btn">
                                <button class="btn btn-fill-out btn-addtocart" type="button"><i
                                        class="icon-basket-loaded"></i> افزودن به سبد خرید
                                </button>
                            </div>
                        </div>
                        <hr/>
                        <ul class="product-meta">
                            <li>دسته بندی: <a href="{{ route('FrontEnd.categories.show', ['category' => $product->category_id, 'type' => 2]) }}">
                                    {{$product->Category->title}}

                                </a></li>
                            <li>هشتگ: <span rel="tag">
                                    @foreach($product->Tags as $tag)#
{{$tag->title}}
                                    @endforeach
                                </span></li>
                        </ul>

                        <div class="product_share">
                            <span>اشتراک:</span>
                            <ul class="social_icons">
                                @if (isset($socials))
                                    @foreach ($socials['data'] as $social)
                                        <li>
                                            <a href="//{{ $social['link'] }}"
                                               class="sc_{{\Modules\SiteInformation\Entities\Socials::SOCIALS[$social['type']]}}">
                                                <i class=" {{ \Modules\SiteInformation\Entities\Socials::SOCIALS[$social['type']]['icon'] }}"></i>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="large_divider clearfix"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="tab-style3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="Description-tab" data-toggle="tab"
                                   href="#Description" role="tab" aria-controls="Description"
                                   aria-selected="true">توضیحات</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Additional-info-tab" data-toggle="tab"
                                   href="#Additional-info" role="tab"
                                   aria-controls="Additional-info" aria-selected="false">اطلاعات اضافی</a>
                            </li>
                        </ul>
                        <div class="tab-content shop_info_tab">
                            <div class="tab-pane fade show active" id="Description" role="tabpanel"
                                 aria-labelledby="Description-tab">
                                <p>{!!$product->description!!}</p>
                            </div>
                            <div class="tab-pane fade" id="Additional-info" role="tabpanel"
                                 aria-labelledby="Additional-info-tab">
                                <table class="table table-bordered">
                                    @foreach($product->Informations->information as $info)


                                    <tr>
                                        <td>{{$info->title}}</td>
                                        <td>{{$info->value}}</td>
                                    </tr>

                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="small_divider"></div>
                    <div class="divider"></div>
                    <div class="medium_divider"></div>
                </div>
            </div>

        </div>
    </div>



@endsection
@push('scripts')

    <!-- Latest jQuery -->
    <script src="{{asset('assets/js/jquery-1.12.4.min.js')}}"></script>
    <!-- jquery-ui -->
    <script src="{{asset('assets/js/jquery-ui.js')}}"></script>
    <!-- popper min js -->
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <!-- Latest compiled and minified Bootstrap -->
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- owl-carousel min js  -->
    <script src="{{asset('assets/owlcarousel/js/owl.carousel.min.js')}}"></script>
    <!-- magnific-popup min js  -->
    <script src="{{asset('assets/js/magnific-popup.min.js')}}"></script>
    <!-- waypoints min js  -->
    <script src="{{asset('assets/js/waypoints.min.js')}}"></script>
    <!-- parallax js  -->
    <script src="{{asset('assets/js/parallax.js')}}"></script>
    <!-- countdown js  -->
    <script src="{{asset('assets/js/jquery.countdown.min.js')}}"></script>
    <!-- imagesloaded js -->
    <script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <!-- isotope min js -->
    <script src="{{asset('assets/js/isotope.min.js')}}"></script>
    <!-- jquery.dd.min js -->
    <script src="{{asset('assets/js/jquery.dd.min.js')}}"></script>
    <!-- slick js -->
    <script src="{{asset('assets/js/slick.min.js')}}"></script>
    <!-- elevatezoom js -->
    <script src="{{asset('assets/js/jquery.elevatezoom.js')}}"></script>
    <!-- scripts js -->
    <script src="{{asset('assets/js/scripts.js')}}"></script>

@endpush



{{--@foreach($product->images as $image)--}}
{{--    <figure class="product-image">--}}
{{--        <img src="{{asset("uploads/products/images/$image")}}"--}}
{{--             data-zoom-image="{{asset("uploads/products/images/$image")}}"--}}
{{--             alt="اسمارت واچ" width="800" height="900">--}}
{{--        <a href="#" class="product-gallery-btn product-image-full"><i--}}
{{--                class="w-icon-zoom"></i></a>--}}
{{--    </figure>--}}
{{--@endforeach--}}
