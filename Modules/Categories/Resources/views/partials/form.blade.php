<div class="row">
<div class="col-sm-6 col-md-6 form-group">
    <label for="title-input">عنوان</label>
    <input type="text" class="form-control" name="title"
           value="{{ old('title') ? old('title') : $category->title }}">
</div>


{{-- **** **** ****      Social      **** **** **** --}}
<div class="form-group col-sm-6 col-md-6">
    <label for="type-input">نوع</label>
    <select class="form-control kt-select2" name="icon"
            style="width: 100%">
        @foreach (\Modules\Categories\Entities\Category::ICON as $item)
            <option value="{{ $item['type'] }}"
                {{ old('type') == $item['title'] ? 'selected' : '' }}>
                {{ $item['title'] }}</option>
        @endforeach
    </select>
</div>

</div>
<div class="form-group">
    <button type="submit" class="btn btn-success btn-sm">ثبت</button>
</div>
