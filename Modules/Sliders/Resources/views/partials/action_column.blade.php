@if(!$slider -> deleted_at)
    <button type="button" class="btn btn-danger btn-sm" action-method="POST" button-type="delete"
    data-link="{{ route('admin.slider.ajax.destroy', $slider -> id) }}">حذف</button>

    <a href="{{ route('admin.slider.show', $slider -> id) }}" class="btn btn-primary btn-sm">ویرایش</a>
@elseif($slider -> deleted_at)
    <button type="button" class="btn btn-primary btn-block btn-sm" action-method="POST" button-type="restore"
            data-link="{{ route('admin.slider.ajax.restore') }}" data-id="{{ $slider -> id }}">بازگردانی</button>
@endif