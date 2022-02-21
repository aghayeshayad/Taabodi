@extends('layouts.Dashboard.master')

@section('title', 'ویرایش اطلاعات سایت')
@section('breadCrumb', \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('edit-siteinformations'))

@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        ویرایش اطلاعات سایت
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <!--begin: Datatable -->
                <div class="table table-striped ">
                    <button class="btn btn-circle btn-hover-brand tablinks" onclick="openInfo(event, 'اطلاعات سایت')" id="1">اطلاعات سایت</button>
                    <button class="btn btn-circle btn-hover-brand tablinks" onclick="openInfo(event, 'درباره ما')" id="2">درباره ما</button>
                    <button class="btn btn-circle btn-hover-brand tablinks" onclick="openInfo(event, 'ارتباط با ما')" id="3">ارتباط با ما</button>
                    <button class="btn btn-circle btn-hover-brand tablinks" onclick="openInfo(event, 'ویژگی ها')" id="4">ویژگی ها</button>
                </div>
                <div id="اطلاعات سایت" class="tabcontent">
                    @if(!$site)
                        <hr>
                        <div class="row">
                            <div class="col-lg-6 bg-transparent">
                                <p class="font-weight-bold">تا به حال اطلاعاتی وارد نکرده اید. در صورت تمایل از دکمه ی زیر استفاده کنید:</p>
                            </div>
                        </div>
                        <div class="kt-portlet__head-toolbar ">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">
                                    <a href="{{ route('admin.siteinformation.create' , '1') }}" class="btn btn-label-brand btn-elevate btn-icon-sm">
                                        <i class="la la-plus"></i>
                                        جدید
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <form method="post" action="{{route('admin.siteinformation.store' ) }}">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="title"> دسته بندی:</label>
                                    <input type="text" name="title" class="form-control"  value="اطلاعات سایت" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="address">آدرس</label>
                                    <textarea name="address" rows="5" class="form-control" placeholder="آدرس خود را وارد کنید..." required>{{$site->address}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label for="mobile_number">شماره تلفن</label>
                                    <input type="text" name="mobile_number" class="form-control" placeholder="شماره تماس خود را وارد کنید..." value="{{$site->mobile_number}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label for="email">ایمیل</label>
                                    <input type="text" name="email" class="form-control" placeholder="ایمیل خود را وارد کنید..." value="{{$site->email}}" required>
                                </div>
                            </div>
                            @component('Components.Dashboard.Form.submit-button')@endcomponent
                        </form>
                    @endif
                </div>
                <div id="درباره ما" class="tabcontent">
                    @if(!$about)
                        <hr>
                        <div class="row">
                            <div class="col-lg-6 bg-transparent">
                                <p class="font-weight-bold">تا به حال اطلاعاتی وارد نکرده اید. در صورت تمایل از دکمه ی زیر استفاده کنید:</p>
                            </div>
                        </div>
                        <div class="kt-portlet__head-toolbar ">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">
                                    <a href="{{ route('admin.siteinformation.create' , '2') }}" class="btn btn-label-brand btn-elevate btn-icon-sm">
                                        <i class="la la-plus"></i>
                                        جدید
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <form method="post" action="{{route('admin.siteinformation.store') }}" enctype="multipart/form-data">
                          {{csrf_field()}}
                            <div class="form-group row">
                               <div class="col-lg-6">
                                    <label for="title"> دسته بندی:</label>
                                  <input type="text" name="title" class="form-control"  value="درباره ما" disabled>
                                </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-lg-6">
                                     <label for="aboutus">درباره ما</label>
                                     <textarea name="aboutus" rows="5" class="form-control" placeholder="متن درباره ما را وارد کنید..." required>{{$about->aboutus}}
                                     </textarea>
                                 </div>
                             </div>

                            <div class="form-group row">
                                {{--Begin image input--}}
                                <div class="col-lg-12">
                                    <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                                        <label>عکس درباره ما</label>
                                        <div class="kt-avatar__holder"
                                             style="background-image: url('/Uploads/SiteInformation/2/{{$about->image }}')"></div>
                                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="ویرایش تصویر">
                                            <i class="fa fa-pen"></i>
                                            <input type="file" name="image" accept=".png, .jpg, .jpeg">
                                        </label>
                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="حذف تصویر">
														<i class="fa fa-times"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                           @component('Components.Dashboard.Form.submit-button')@endcomponent
                        </form>
                    @endif
                </div>
                <div id="ارتباط با ما" class="tabcontent">
                    @if(!$contact)
                        <hr>
                        <div class="row">
                            <div class="col-lg-6 bg-transparent">
                                <p class="font-weight-bold">تا به حال اطلاعاتی وارد نکرده اید. در صورت تمایل از دکمه ی زیر استفاده کنید:</p>
                            </div>
                        </div>
                        <div class="kt-portlet__head-toolbar ">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">
                                    <a href="{{ route('admin.siteinformation.create' , '3') }}" class="btn btn-label-brand btn-elevate btn-icon-sm">
                                        <i class="la la-plus"></i>
                                        جدید
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <form method="post" action="{{route('admin.siteinformation.store') }}">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="title"> دسته بندی:</label>
                                    <input type="text" name="title" class="form-control bg-secondary"  value="ارتباط با ما"  disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="number">شماره تلفن</label>
                                    <input type="text" name="number" class="form-control " value="{{$contact->number}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="telegram">کانال تلگرام</label>
                                    <input type="text" name="telegram" class="form-control" value="{{$contact->telegram}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="whatsapp">کانال واتساپ</label>
                                    <input type="text" name="whatsapp" class="form-control" value="{{$contact->whatsapp}}" required>
                                </div>
                            </div>
                            @component('Components.Dashboard.Form.submit-button')@endcomponent
                        </form>

                    @endif
                </div>
                <div id="ویژگی ها" class="tabcontent">
                    @if(!$property)
                        <hr>
                        <div class="row">
                            <div class="col-lg-6 bg-transparent">
                                <p class="font-weight-bold">تا به حال اطلاعاتی وارد نکرده اید. در صورت تمایل از دکمه ی زیر استفاده کنید:</p>
                            </div>
                        </div>
                        <div class="kt-portlet__head-toolbar ">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">
                                    <a href="{{ route('admin.siteinformation.create' , '4') }}" class="btn btn-label-brand btn-elevate btn-icon-sm">
                                        <i class="la la-plus"></i>
                                        جدید
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <form method="post" action="{{route('admin.siteinformation.store') }}">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="title"> دسته بندی:</label>
                                    <input type="text" name="title" class="form-control bg-secondary"  value="ویژگی ها" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="property1">ویژگی اول:</label>
                                    <textarea name="property1" rows="5" class="form-control" required>{{$property->property1}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="property2">ویژگی دوم:</label>
                                    <textarea name="property2" rows="5" class="form-control" required>{{$property->property2}}</textarea>
                                </div>
                            </div>
                            @component('Components.Dashboard.Form.submit-button')@endcomponent
                        </form>
                    @endif
                </div>
            </div>
            <script>
                function openInfo(evt, cityName) {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablinks");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                    }
                    document.getElementById(cityName).style.display = "block";
                    evt.currentTarget.className += " active";
                }

                document.getElementById({{$id}}).click();

            </script>
        </div>
    </div>
    @push('scripts')
    <script src="{{asset("js/file-upload/ktavatar.js")}}"></script>
    @endpush
@endsection
