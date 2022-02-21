<div class="form-group row">
    {{--Begin title and category inputs--}}
    <div class="col-lg-6">
        <label for="title-input">عنوان</label>
        <input type="text" class="form-control" placeholder="لطفا عنوان را وارد نمایید." title="لطفا عنوان را وارد نمایید."
               name="title" id="title-input" value="{{ old('title') ?? $banner -> title }}" required>
    </div>
    <div class="col-lg-6">
        <label for="link-input">لینک</label>
        <input type="text" class="form-control" placeholder="لطفا لینک را وارد نمایید." title="لطفا لینک را وارد نمایید."
               name="link" id="link-input" value="{{ old('link') ?? $banner -> link }}">
    </div>
    <div class="col-lg-6">
        <label for="category-input">نوع بنر</label> <br>
        <select class="form-control kt-select2" name="type" data-placeholder="لطفا نوع بنر را انتخاب نمایید." title="لطفا نوع بنر را انتخاب نمایید." required>
                <option value="3" {{ (old('type') ?? 3 == $banner->type) ? 'selected': '' }}>دوتایی چپ</option>
                <option value="1" {{ (old('type') ?? 1 == $banner->type) ? 'selected': '' }}>تکی راست</option>
                <option value="2" {{ (old('type') ?? 2 == $banner->type) ? 'selected': '' }}>تکی چپ</option>
                <option value="0" {{ (old('type') ?? 0 == $banner->type) ? 'selected': '' }}>برند</option>
        </select>
    </div>
    {{--End name and category inputs--}}
</div>

<div class="form-group row">
    {{--Begin image inputs--}}
    <div class="col-lg-6">
        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
            <div class="kt-avatar__holder"
                 style="background-image: url('/Uploads/Banner/{{$banner->id}}/{{$banner->image}}')"></div>
            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="ویرایش تصویر">
                <i class="fa fa-pen"></i>
                <input type="file" name="image" accept=".png, .jpg, .jpeg">
            </label>
            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="حذف تصویر">
														<i class="fa fa-times"></i>
													</span>
        </div>
    </div>
    {{--End image inputs--}}
</div>
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
@endpush
