<div class="section pt-10 small_pb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cat_overlap radius_all_5">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12">
                            <div class="cat_slider mt-4 mt-md-0 carousel_slider owl-carousel owl-theme nav_style5"
                                 data-loop="true" data-dots="false" data-nav="true" data-margin="30"
                                 data-responsive='{"0":{"items": "1"}, "380":{"items": "2"}, "991":{"items": "3"}, "1199":{"items": "4"}}'>
                                @foreach($categories as $category)
                                    <div class="item">
                                        <div class="categories_box">
                                            <a href="{{ route('FrontEnd.categories.show', ['category' => $category->id, 'type' => 0]) }}">
                                                <i class="flaticon-printer"></i>
                                                <span>{{$category->title}}</span>
                                            </a>
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
</div>
