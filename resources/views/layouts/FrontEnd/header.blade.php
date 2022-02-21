<!-- START HEADER -->
<header class="header_wrap">

    <div class="bottom_header light_skin main_menu_uppercase bg_dark mb-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 col-3">
                    <div class="categories_wrap">
                        <button type="button" data-toggle="collapse" data-target="#navCatContent" aria-expanded="false"
                                class="categories_btn">
                            <i class="linearicons-menu"></i><span>همه دسته بندی ها </span>
                        </button>
                        <div id="navCatContent" class="nav_cat navbar collapse">
                            <ul>
                                @foreach($categories as $category)
                                    <li class="dropdown dropdown-mega-menu">
                                        <a class="dropdown-item nav-link dropdown-toggler"
                                           href="{{ route('FrontEnd.categories.show', ['category' => $category->id, 'type' => 0]) }}"
                                           data-toggle="dropdown"><i
                                                class="{{ \Modules\Categories\Entities\Category::ICON[$category['icon']]['icon'] }}"></i>
                                            <span>{{$category->title}}</span></a>
                                        <div class="dropdown-menu">
                                            <ul class="mega-menu d-lg-flex">
                                                <li class="mega-menu-col col-lg-12">
                                                    <ul class="d-lg-flex">
                                                        @foreach($category->Children as $subCategory)
                                                            <li class="mega-menu-col col">
                                                                <ul>
                                                                    <li class="dropdown-header">{{$subCategory->title}}</li>
                                                                    @foreach($subCategory->Children as $key=>$value )
                                                                        @if($key<=5)
                                                                            <li>
                                                                                <a class="dropdown-item nav-link nav_item"
                                                                                   href="{{ route('FrontEnd.categories.show', ['category' => $category->id, 'type' => 2]) }}">{{$value->title}}</a>
                                                                            </li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-6 col-9">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler side_navbar_toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSidetoggle" aria-expanded="false">
                            <span class="ion-android-menu"></span>
                        </button>
                        <div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
                            <ul class="navbar-nav">
                                <li><a class="nav-link nav_item" href="{{route('FrontEnd.pages.about-us')}}">تماس با
                                        ما</a></li>
                                <li><a class="nav-link nav_item" href="{{route('FrontEnd.pages.contact-us')}}">ارتباط با
                                        ما</a></li>
                                <li><a class="nav-link nav_item" href="{{route('FrontEnd.pages.faq')}}">سوالات
                                        متداول</a></li>
                                <li><a class="nav-link nav_item" href="{{route('FrontEnd.product.list')}}">
                                        محصولات</a></li>
                            </ul>
                        </div>
                        @auth()

                            <ul class="navbar-nav attr-nav align-items-center">
                                <li><a href="{{route('admin.dashboard.index')}}" class="nav-link"><i class="linearicons-user"></i></a></li>
                            </ul>

                        @else
                        <ul class="navbar-nav attr-nav align-items-center">
                            <li><a href="{{route('login')}}" class="nav-link"><i class="linearicons-user"></i></a></li>
                        </ul>
                        @endauth
                        <div class="pr_search_icon">
                            <a href="javascript:void(0);" class="nav-link pr_search_trigger"><i
                                    class="linearicons-magnifier"></i></a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>


<!-- END HEADER -->
