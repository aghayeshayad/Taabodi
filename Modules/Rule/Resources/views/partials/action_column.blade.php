@if(!$rule -> deleted_at)
    <button type="button" class="btn btn-danger btn-sm" action-method="POST" button-type="delete"
            data-link="{{ route('admin.rule.ajax.destroy', $rule -> id) }}">حذف</button>

    <a href="{{ route('admin.rule.show', $rule -> id) }}" class="btn btn-primary btn-sm">ویرایش</a>
@elseif($rule -> deleted_at)
    <button type="button" class="btn btn-primary btn-block btn-sm" action-method="POST" button-type="restore"
            data-link="{{ route('admin.rule.ajax.restore') }}" data-id="{{ $rule -> id }}">بازگردانی</button>
@endif