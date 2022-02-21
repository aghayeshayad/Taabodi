@if(!$contact->deleted_at)
    <button type="button" class="btn btn-danger btn-sm" action-method="POST" button-type="delete"
    data-link="{{ route('admin.contactus.ajax.destroy', $contact -> id) }}">
        حذف
    </button>
    <a href="{{ route('admin.contactus.show', $contact -> id) }}" class="btn btn-primary btn-sm">
        ویرایش
    </a>
@elseif($contact->deleted_at)
    <button type="button" class="btn btn-primary btn-block btn-sm" action-method="POST" button-type="restore"
    data-id="{{ $contact -> id }}" data-link="{{ route('admin.contactus.ajax.restore') }}">
        بازگردانی
    </button>
@endif
