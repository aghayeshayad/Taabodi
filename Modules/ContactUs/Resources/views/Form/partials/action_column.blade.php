@if(!$formContact->deleted_at)
    <button type="button" class="btn btn-danger btn-sm" action-method="POST" button-type="delete"
    data-link="{{ route('admin.form-contact.ajax.destroy', $formContact -> id) }}">
        حذف
    </button>
    <a href="{{ route('admin.form-contact.show', $formContact -> id) }}" class="btn btn-primary btn-sm">
        ویرایش
    </a>
@elseif($formContact->deleted_at)
    <button type="button" class="btn btn-primary btn-block btn-sm" action-method="POST" button-type="restore"
    data-id="{{ $formContact -> id }}" data-link="{{ route('admin.form-contact.ajax.restore') }}">
        بازگردانی
    </button>
@endif
