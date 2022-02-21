@if(!$notices->deleted_at)
    <button type="button" class="btn btn-danger btn-sm" action-method="POST" button-type="delete"
    data-link="{{ route('admin.notices.ajax.destroy', $notices -> id) }}">
        حذف
    </button>
    <a href="{{ route('admin.notices.show', $notices -> id) }}" class="btn btn-primary btn-sm">
        ویرایش
    </a>
@elseif($notices->deleted_at)
    <button type="button" class="btn btn-primary btn-block btn-sm" action-method="POST" button-type="restore"
    data-id="{{ $notices -> id }}" data-link="{{ route('admin.notices.ajax.restore') }}">
        بازگردانی
    </button>
@endif
