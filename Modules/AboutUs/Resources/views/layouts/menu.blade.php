@cannot('AboutUs')
    <li class="kt-menu__item
{{ \App\Http\Helpers\Menu::routeIsActive('admin.aboutus.index', 'kt-menu__item--open kt-menu__item--active') }}"
        aria-haspopup="true">
        <a href="{{ route('admin.aboutus.index') }}" class="kt-menu__link ">
            <i class="kt-menu__link-icon far fa-comment-dots"></i>
            <span class="kt-menu__link-text">درباره ما</span>
        </a>
    </li>
@endcannot
