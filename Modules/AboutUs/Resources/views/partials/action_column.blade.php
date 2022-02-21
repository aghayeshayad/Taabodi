@if(!$about->deleted_at)
    <button type="button" class="btn btn-danger btn-sm" action-method="POST" button-type="delete"
    data-link="{{ route('admin.aboutus.ajax.destroy', $about -> id) }}">
        حذف
    </button>
    <a href="{{ route('admin.aboutus.show', $about -> id) }}" class="btn btn-primary btn-sm">
        ویرایش
    </a>
@elseif($about->deleted_at)
    <button type="button" class="btn btn-primary btn-block btn-sm" action-method="POST" button-type="restore"
    data-id="{{ $about -> id }}" data-link="{{ route('admin.aboutus.ajax.restore') }}">
        بازگردانی
    </button>
@endif
