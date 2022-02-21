<div class="form-group row">
    <div class="col-lg-6">
        <label for="title-input">عنوان</label>
        <input type="text" class="form-control" placeholder="لطفا عنوان را وارد نمایید." title="لطفا عنوان را وارد نمایید."
               name="title" id="title-input" value="{{ old('title') ?? $notices -> title }}" required>
    </div>
    <div class="col-lg-6">
        <label for="link-input">ایمیل</label>
        <input type="email" class="form-control" placeholder="لطفا ایمیل را وارد نمایید." title="لطفا ایمیل را وارد نمایید."
               name="email" id="link-input" value="{{ old('email') ?? $notices -> email }}">
    </div>
</div>
@component('Components.Dashboard.Form.submit-button')@endcomponent

@push('scripts')

@endpush
