<div class="form-group row">
    {{--Begin slider image input--}}
    <div class="col-lg-6">
        <label for="">تصویر (817*361)</label>
        <input type="file" class="custom-file-input" name="image" id="image-input">
        <label class="custom-file-label m-input" for="image-input">لطفا یک تصویر انتخاب نمایید.</label>
    </div>
    {{--End slider image input--}}

    {{--Begin name input--}}
    <div class="col-lg-6">
        <label for="title-input">عنوان</label>
        <input type="text" class="form-control" id="title-input" placeholder="لطفا یک متن وارد نمایید."
               name="title" value="{{ old('title') ?? $slider -> title }}">
    </div>
    <div class="col-lg-6">
        <label for="category-input">نوع اسلایدر</label> <br>
        <select class="form-control kt-select2" name="type" data-placeholder="لطفا نوع بنر را انتخاب نمایید."
                title="لطفا نوع اسلایدر را انتخاب نمایید." required>
            <option value="1" {{ (old('type') ?? 1 == $slider->type) ? 'selected': '' }}>اسلایدر اصلی</option>
            <option value="2" {{ (old('type') ?? 2 == $slider->type) ? 'selected': '' }}>محصولات شگفت انگیز</option>
            <option value="3" {{ (old('type') ?? 3 == $slider->type) ? 'selected': '' }}>پیشنهاد لحظه ای</option>
            <option value="4" {{ (old('type') ?? 4 == $slider->type) ? 'selected': '' }}>دسته بندی یک</option>
            <option value="5" {{ (old('type') ?? 5 == $slider->type) ? 'selected': '' }}>دسته بندی دو</option>
            <option value="6" {{ (old('type') ?? 6 == $slider->type) ? 'selected': '' }}>دسته بندی سه</option>
            <option value="7" {{ (old('type') ?? 7 == $slider->type) ? 'selected': '' }}>دسته بندی چهار</option>
        </select>
    </div>
    {{--Begin name input--}}
    <div class="col-lg-12">
        <label for="link-input">لینک</label>
        <input type="text" class="form-control" id="link-input" placeholder="لطفا یک لینک وارد نمایید."
               name="link" value="{{ old('link') ?? $slider -> link }}">
    </div>
</div>
{{--End name input--}}

@component('Components.Dashboard.Form.submit-button')@endcomponent

@push('scripts')

@endpush
