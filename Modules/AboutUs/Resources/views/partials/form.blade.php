<div class="form-group row">
    {{--Begin title inputs--}}
    <div class="col-lg-6">
        <label for="title-input">عنوان</label>
        <input type="text" class="form-control" placeholder="لطفا عنوان را وارد نمایید." title="لطفا عنوان را وارد نمایید."
               name="title" id="title-input" value="{{ old('title') ?? $about -> title }}" required>
    </div>
    {{--End name inputs--}}
</div>
<div class="form-group row">
    {{--Begin image and file inputs--}}
    <div class="col-lg-12">
        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
            <div class="kt-avatar__holder"
                 style="background-image: url('{{ $about->image }}')"></div>
            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="ویرایش تصویر">
                <i class="fa fa-pen"></i>
                <input type="file" name="image" accept=".png, .jpg, .jpeg">
            </label>
            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="حذف تصویر">
														<i class="fa fa-times"></i>
													</span>
            <p>سایز تصویر 1100*560</p>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-6">
        <label for="">فایل</label>
        <input type="file" class="custom-file-input" id="file-input" name="file">
        <label class="custom-file-label m-input" for="file-input">لطفا یک فایل انتخاب نمایید.</label>
    </div>
    @if($about->file)
        <div class="col-lg-6"></div>
        <div class="col-lg-6">
            <button type="button" class="btn btn-danger btn-block delete-file" style="margin-top: -35px; height: 31px;"
                    data-link="{{ route('admin.aboutus.ajax.delete-file') }}" data-id="{{ $about -> id }}">
                <i class="fa fa-trash"></i>
            </button>
        </div>
    @endif
    {{--End image and file inputs--}}
</div>

{{--Begin data input--}}
<div class="form-group" id="kt_repeater_1" style="margin-top: 20px">
    <div id="kt_repeater_1">
        <div class="form-group-last row mb-3">
            <div class="col-lg-4">
                <a href="javascript:;" data-repeater-create="" class="btn btn-bold btn-sm btn-label-brand">
                    <i class="la la-plus"></i> Add
                </a>
            </div>
        </div>
        <div data-repeater-list="data-items" class="multi-images">
            @if(!$about->properties)
                <div data-repeater-item class="align-items-center">
                    <label for="title-input">ویژگی ها</label>
                    <div class="row">
                        <div class="col-lg-4">
                            <input type="text" class="form-control" id="title-input"
                                   placeholder="لطفا یک عنوان برای این ویژگی وارد نمایید."
                                   name="title" value="{{ old('title') }}">
                        </div>
                        <div class="col-lg-4">
                            <input type="text" class="form-control"
                                   placeholder="لطفا توضیحات برای این ویژگی وارد نمایید."
                                   name="item" value="{{ old('item') }}">
                        </div>
                        <br>
                        <div class="col-lg-3 col-md-4">
                            <a href="javascript:;" data-repeater-delete=""
                               class="btn-sm btn btn-label-danger btn-bold">
                                Delete
                            </a>
                        </div>
                    </div>
                </div>
            @else
                @foreach($about->properties as $item)
                    <div data-repeater-item class="align-items-center">
                        <label for="title-input">ویژگی ها</label>
                        <div class="row">
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="title-input"
                                       placeholder="لطفا یک عنوان برای این ویژگی وارد نمایید."
                                       name="title" value="{{ old('title') ?? $item['title'] }}">
                            </div>
                            <div class="col-lg-4">
                                <input type="text" class="form-control"
                                       placeholder="لطفا توضیحات برای این ویژگی وارد نمایید."
                                       name="item" value="{{ old('item') ?? $item['item'] }}">
                            </div>
                            <br>
                            <div class="col-lg-3 col-md-4">
                                <a href="javascript:;" data-repeater-delete=""
                                   class="btn-sm btn btn-label-danger btn-bold">
                                    Delete
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
        @endif
    </div>
</div>
{{--End data input--}}

{{--Begin google_description input--}}
<div class="form-group">
    <label for="meta-description-input">توضیحات متا</label>
    <textarea name="meta_description" id="meta-description-input" rows="5" class="form-control"
              placeholder="لطفا توضحات متا مقاله را برای گوگل وارد نمایید.(بهتر است بین 500 - 700 کاراکتر باشد)" required>{!! $about->meta_description !!}</textarea>
</div>
{{--End google_description input--}}

{{--Begin short_description input--}}
<div class="form-group">
    <label for="short_description-input">توضیحات کوتاه</label>
    <textarea name="short_description" id="short_description-input" rows="5" class="form-control"
              placeholder="لطفا توضحات کوتاه را وارد کنید" required>{!! $about->short_description !!}</textarea>
</div>
{{--End short_description input--}}

{{--Begin short_description input--}}
<div class="form-group">
    <label for="why_us-input">چرا ما؟؟</label>
    <textarea name="why_us" id="why_us-input" rows="5" class="form-control"
              placeholder="لطفا توضیحاتی درباره چرا ما را انتخاب کنند وارد کنید">{!! $about->why_us !!}</textarea>
</div>
{{--End short_description input--}}

{{--Begin description input--}}
<div class="form-group">
    <label for="description-input">توضیحات</label>
    <textarea name="description" id="description-input" rows="5" class="form-control"
              placeholder="لطفا توضحات مقاله را وارد نمایید." required>{!! $about->description !!}</textarea>
</div>
{{--End description input--}}

@component('Components.Dashboard.Form.submit-button')@endcomponent

@push('scripts')

    {{--start avatar scripts--}}
    <script src="{{asset("js/file-upload/ktavatar.js")}}"></script>
    {{--start avatar scripts--}}

    {{--Select2 scripts--}}
    <script type="text/javascript">
        $(document).ready(function () {
            $('.kt-select2').select2({});
            $('.tags').select2({
                tags: true
            });
            $('#related-tag-selector').select2({
                tags: true
            });
        });
    </script>

    {{--CKEditor scripts--}}
    <script type="text/javascript" src="{{ asset('/js/Dashboard/ckeditor/ckeditor.js') }}"></script>
    @include('ckfinder::setup')
    <script type="text/javascript">
        $(document).ready(function () {
            let description = CKEDITOR.replace('description-input', {});
            CKFinder.setupCKEditor(description);
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.delete-file').on('click', function () {
                let parent = $(this);
                swal.fire({
                    title: "آیا از حذف این مورد مطمئن هستید؟",
                    text: "پس از حذف می توان مجددا مورد حذف شده را بارگذاری نمود.",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "بله",
                    cancelButtonText: "خیر",
                    showLoaderOnConfirm: false
                }).then(function (result) {
                    if (result.value) {
                        $.ajax({
                            url: parent.attr('data-link'),
                            type: "POST",
                            data: {
                                id: parent.attr('data-id'),
                                '_token': '{{ csrf_token() }}'
                            },
                            success: function (data) {
                                location.reload();
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
