@if(!$banner->deleted_at)
    @if($banner->status)
        <button type="button" class="btn btn-warning btn-sm" action-method="POST"
        data-id="{{ $banner -> id }}" button-type="disable"
        data-link="{{ route('admin.banner.ajax.disable') }}">عدم نمایش</button>
    @elseif(!$banner->status)
        <button type="button" class="btn btn-success btn-sm" action-method="POST"
                data-id="{{ $banner -> id }}" button-type="enable"
                data-link="{{ route('admin.banner.ajax.enable') }}">نمایش</button>
    @endif
    <button type="button" class="btn btn-danger btn-sm" action-method="POST" button-type="delete"
    data-link="{{ route('admin.banner.ajax.destroy', $banner -> id) }}">
        حذف
    </button>
    <a href="{{ route('admin.banner.show', $banner -> id) }}" class="btn btn-primary btn-sm">
        ویرایش
    </a>
@elseif($banner->deleted_at)
    <button type="button" class="btn btn-primary btn-block btn-sm" action-method="POST" button-type="restore"
    data-id="{{ $banner -> id }}" data-link="{{ route('admin.banner.ajax.restore') }}">
        بازگردانی
    </button>
@endif
