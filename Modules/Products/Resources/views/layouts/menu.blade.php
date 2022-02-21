<li class='kt-menu__item  kt-menu__item--submenu'>

    <a href='javascript:;' class='kt-menu__link kt-menu__toggle'>
        <i class='kt-menu__link-icon flaticon2-file-1'></i>
        <span class='kt-menu__link-text'>محصولات</span>
        <i class='kt-menu__ver-arrow la la-angle-left'></i>
    </a>
    <div class='kt-menu__submenu'>

        <ul class='kt-menu__subnav'>
            <li class='kt-menu__item'>
                <a href='{{ route('admin.products.index') }}' class='kt-menu__link'>
                    <i class='kt-menu__link-bullet kt-menu__link-bullet--dot'>
                        <span></span>
                    </i>
                    <span
                        class='kt-menu__link-text {{ \App\Http\Helpers\Menu::routeIsActive('admin.products.index', 'text-danger') }}'>
                       لیست محصولات
                    </span>
                </a>
            </li>

            <li class='kt-menu__item'>
                <a href='{{ route('admin.categories.index') }}' class='kt-menu__link'>
                    <i class='kt-menu__link-bullet kt-menu__link-bullet--dot'>
                        <span></span>
                    </i>
                    <span
                        class='kt-menu__link-text {{ \App\Http\Helpers\Menu::routeIsActive('admin.categories.index', 'text-danger') }}'>
                      دسته بندی
                    </span>
                </a>
            </li>

        </ul>
    </div>
</li>

