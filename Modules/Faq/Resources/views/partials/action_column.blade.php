@if(!$faq -> deleted_at)
    @if($faq->status)
        <button type="button" class="btn btn-warning btn-sm" action-method="POST"
                data-id="{{ $faq -> id }}" button-type="disable"
                data-link="{{ route('admin.faq.ajax.disable') }}">عدم نمایش</button>
    @elseif(!$faq->status)
        <button type="button" class="btn btn-success btn-sm" action-method="POST"
                data-id="{{ $faq -> id }}" button-type="enable"
                data-link="{{ route('admin.faq.ajax.enable') }}">نمایش</button>
    @endif
    <button type="button" class="btn btn-danger btn-sm" data-link="{{ route('admin.faq.ajax.destroy', [$faq->id]) }}"
            action-method="POST" button-type="delete">حذف
    </button>
    <a href="{{ route('admin.faq.edit',  [$faq->id]) }}" class="btn btn-primary btn-sm">ویرایش</a>
@elseif($faq->deleted_at)
    <button type="button" class="btn btn-success btn-block btn-sm" action-method="POST" button-type="restore"
            data-id="{{ $faq -> id }}" data-link="{{ route('admin.faq.ajax.restore') }}">
        بازگردانی
    </button>
@endif
