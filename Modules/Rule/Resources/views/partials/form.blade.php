<div class="form-group row">


    {{--Begin description input--}}

    <div class="col-lg-12">
        <label for="title-input">توضیحات</label>
        <textarea type="text" class="form-control" id="title-input" placeholder="لطفا توضیحات قوانین را وارد نمایید."
                  name="description" >{{ old('description') ?? $rule -> description }}</textarea>
    </div>

    {{--End description input--}}

</div>

@component('Components.Dashboard.Form.submit-button')@endcomponent

@push('scripts')

@endpush