<div class="form-group row">
    <div class="col-lg-12">
        <label for="title-input"></label> <br> <br>
        <label class="kt-checkbox kt-checkbox--tick kt-checkbox--danger">
            <input type="checkbox" name="status" @if($faq -> status) checked @endif>نمایش دادن
            <span></span>
        </label>
    </div>
    <div class="col-lg-6">
        <label for="title-input">عنوان</label>
        <input type="text" class="form-control" id="title-input" name="title"
               value="{{ old('title') ?? $faq -> title }}">
    </div>
    <div class="col-lg-12">
        <label for="title-input">سوال</label>
        <textarea class="form-control" id="question-input" name="question" rows="4" cols="50">{{ old('question') ?? $faq -> question }}</textarea>
    </div>
    <div class="col-lg-12">
        <label for="title-input">پاسخ سوال</label>
        <textarea class="form-control" id="answer-input" name="answer" rows="4"
                  cols="50">{{ old('answer') ?? $faq -> answer }}</textarea>
    </div>
</div>
@component('Components.Dashboard.Form.submit-button')@endcomponent
