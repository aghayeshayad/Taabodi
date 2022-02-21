@extends('layouts.FrontEnd.master')
@section('title', 'محصول')

@section('meta_description')

@endsection
@section('content')
    @include('layouts.FrontEnd.headerFix')



    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>محصولات</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="{{route('FrontEnd.home.index')}}">خانه</a></li>
                        <li class="breadcrumb-item active">محصولات</li>
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>
    <!-- END SECTION BREADCRUMB -->

    <!-- START MAIN CONTENT -->
    <div class="main_content">

        <!-- START SECTION SHOP -->
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row shop_container">
                            @foreach($products as $product)
                                <div class="col-md-4 col-6">
                                    <div class="product">
                                        <div class="product_img">
                                            <a href="#">
                                                <img src="{{$product->image}}" alt="{{$product->title}}">
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="#">{{$product->title}}</a>
                                            </h6>
                                            <div class="product_price">
                                                <span class="price">{{$product->price}} تومان</span>
                                            </div>
                                            <div class="rating_wrap">
                                                <div class="rating">
                                                    <div class="product_rate" style="width:80%"></div>
                                                </div>
                                            </div>
                                            <div class="pr_desc">
                                                <p>
                                                    {{$product->description}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
                        <div class="sidebar">
                            <div class="widget">
                                <h5 class="widget_title">دسته بندی ها</h5>
                                <ul class="widget_categories">
                                    @foreach($subCategories as $subcategory)
                                        @foreach($subcategory->Children as $ssubCategory)
                                            <li>
                                                <a href="{{ route('FrontEnd.categories.show', ['category' => $ssubCategory->id, 'type' => 0]) }}"><span
                                                        class="categories_name">{{$ssubCategory->title}}</span>
                                            </a>

                                            </li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                            <div class="widget">

                                <h5 class="widget_title">برند</h5>
                                <ul class="list_brand">
                                    @foreach($subCategories as $subcategory)
                                        @foreach($subcategory->Children as $ssubCategory)
                                            <li>
                                                <ul class="menu-item-dropup">
                                                    <a href="{{ route('FrontEnd.categories.show', ['category' => $ssubCategory->id, 'type' => 0]) }}"><span
                                                            class="categories_name">{{$ssubCategory->title}}</span>
                                                    </a>
                                                </ul>

                                            </li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->

@endsection
@push('scripts')

@endpush


