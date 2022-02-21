<div class="form-group row">
    {{--Begin title inputs--}}
    <div class="col-lg-6">
        <label for="name-input">نام و نام خانوادگی</label>
        <input type="text" class="form-control" placeholder="لطفا نام و نام خانوادگی را وارد نمایید." title="لطفا نام و نام خانوادگی را وارد نمایید."
               name="name" id="name-input" value="{{ old('name') ?? $formContact -> name }}" required>
    </div>
    {{--End name inputs--}}
    {{--Begin email inputs--}}
    <div class="col-lg-6">
        <label for="email-input">ایمیل</label>
        <input type="text" class="form-control" placeholder="لطفا ایمیل را وارد نمایید." title="لطفا ایمیل را وارد نمایید."
               name="email" id="email-input" value="{{ old('email') ?? $formContact -> email }}" required>
    </div>
    {{--End email inputs--}}
</div>
<div class="form-group row">
    {{--Begin phone inputs--}}
    <div class="col-lg-6">
        <label for="subject-input">موضوع</label>
        <input type="text" class="form-control" placeholder="لطفا موضوع را وارد نمایید." title="لطفا موضوع را وارد نمایید."
               name="subject" id="subject-input" value="{{ old('subject') ?? $formContact -> subject }}" required>
    </div>
    {{--End phone inputs--}}
    {{--Begin mobile inputs--}}
    <div class="col-lg-6">
        <label for="mobile-input">شماره همراه</label>
        <input type="text" class="form-control" placeholder="لطفا شماره همراه را وارد نمایید." title="لطفا شماره همراه را وارد نمایید."
               name="mobile" id="mobile-input" value="{{ old('mobile') ?? $formContact -> mobile }}">
    </div>
    {{--End mobile inputs--}}
</div>

{{--Begin short_description input--}}
<div class="form-group">
    <label for="message-input">پیام</label>
    <textarea name="message" id="message-input" rows="5" class="form-control"
              placeholder="لطفا پیام را وارد کنید" required>{!! $formContact->message !!}</textarea>
</div>
{{--End short_description input--}}

@component('Components.Dashboard.Form.submit-button')@endcomponent

@push('scripts')

@endpush
