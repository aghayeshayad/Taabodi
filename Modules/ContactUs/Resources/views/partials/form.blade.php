<div class="form-group row">
    {{--Begin title inputs--}}
    <div class="col-lg-6">
        <label for="title-input">عنوان</label>
        <input type="text" class="form-control" placeholder="لطفا عنوان را وارد نمایید." title="لطفا عنوان را وارد نمایید."
               name="title" id="title-input" value="{{ old('title') ?? $contact -> title }}" required>
    </div>
    {{--End name inputs--}}
    {{--Begin email inputs--}}
    <div class="col-lg-6">
        <label for="email-input">ایمیل</label>
        <input type="text" class="form-control" placeholder="لطفا ایمیل را وارد نمایید." title="لطفا ایمیل را وارد نمایید."
               name="email" id="email-input" value="{{ old('email') ?? $contact -> email }}" required>
    </div>
    {{--End email inputs--}}
</div>
<div class="form-group row">
    {{--Begin phone inputs--}}
    <div class="col-lg-6">
        <label for="phone-input">شماره تلفن</label>
        <input type="text" class="form-control" placeholder="لطفا شماره تلفن را وارد نمایید." title="لطفا شماره تلفن را وارد نمایید."
               name="phone" id="phone-input" value="{{ old('phone') ?? $contact -> phone }}" required>
    </div>
    {{--End phone inputs--}}
    {{--Begin mobile inputs--}}
    <div class="col-lg-6">
        <label for="mobile-input">شماره همراه</label>
        <input type="text" class="form-control" placeholder="لطفا شماره همراه را وارد نمایید." title="لطفا شماره همراه را وارد نمایید."
               name="mobile" id="mobile-input" value="{{ old('mobile') ?? $contact -> mobile }}" required>
    </div>
    {{--End mobile inputs--}}
</div>
<div class="form-group row">
    {{--Begin address inputs--}}
    <div class="col-lg-12">
        <label for="address-input">آدرس</label>
        <input type="text" class="form-control" placeholder="لطفا آدرس را وارد نمایید." title="لطفا آدرس را وارد نمایید."
               name="address" id="address-input" value="{{ old('address') ?? $contact -> address }}" required>
    </div>
    {{--End address inputs--}}
</div>


{{--Begin google_description input--}}
<div class="form-group">
    <label for="meta-description-input">توضیحات متا</label>
    <textarea name="meta_description" id="meta-description-input" rows="5" class="form-control"
              placeholder="لطفا توضحات متا مقاله را برای گوگل وارد نمایید.(بهتر است بین 500 - 700 کاراکتر باشد)" required>{!! $contact->meta_description !!}</textarea>
</div>
{{--End google_description input--}}

{{--Begin short_description input--}}
<div class="form-group">
    <label for="short_description-input">توضیحات کوتاه</label>
    <textarea name="short_description" id="short_description-input" rows="5" class="form-control"
              placeholder="لطفا توضحات کوتاه را وارد کنید" required>{!! $contact->short_description !!}</textarea>
</div>
{{--End short_description input--}}

{{--Begin description input--}}
<div class="form-group">
    <label for="description-input">توضیحات</label>
    <textarea name="description" id="description-input" rows="5" class="form-control"
              placeholder="لطفا توضحات مقاله را وارد نمایید." required>{!! $contact->description !!}</textarea>
</div>
{{--End description input--}}

@component('Components.Dashboard.Form.submit-button')@endcomponent

@push('styles')
    <link rel="stylesheet" href="{{ asset('js/Dashboard/bootstrap-datepicker-fa/dist/css/persian-datepicker.css') }}">
@endpush

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
