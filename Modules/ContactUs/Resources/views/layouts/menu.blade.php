
    <li class='kt-menu__item  kt-menu__item--submenu
{{ \App\Http\Helpers\Menu::routeStartsWith('admin.contactus', 'kt-menu__item--open kt-menu__item--active') }}
    {{ \App\Http\Helpers\Menu::routeStartsWith('admin.form-contact', 'kt-menu__item--open kt-menu__item--active') }}'
        aria-haspopup='true' data-ktmenu-submenu-toggle='hover'>
        <a href='javascript:;' class='kt-menu__link kt-menu__toggle'>
            <i class='kt-menu__link-icon fas fa-phone-volume'></i>
            <span class='kt-menu__link-text'>تماس با ما</span>
            <i class='kt-menu__ver-arrow la la-angle-left'></i>
        </a>
        <div class='kt-menu__submenu'>
            <ul class='kt-menu__subnav'>
                <li class='kt-menu__item'>
                    <a href='{{ route('admin.contactus.index') }}' class='kt-menu__link'>
                        <i class='kt-menu__link-bullet kt-menu__link-bullet--dot'>
                            <span></span>
                        </i>
                        <span
                            class='kt-menu__link-text {{ \App\Http\Helpers\Menu::routeIsActive('admin.contactus.index', 'text-danger') }}'>
                       اطلاعات تماس
                    </span>
                    </a>
                </li>
                <li class='kt-menu__item'>
                    <a href='{{ route('admin.form-contact.index') }}' class='kt-menu__link'>
                        <i class='kt-menu__link-bullet kt-menu__link-bullet--dot'>
                            <span></span>
                        </i>
                        <span
                            class='kt-menu__link-text {{ \App\Http\Helpers\Menu::routeIsActive('admin.form-contact.index', 'text-danger') }}'>
                        فرم تماس
                    </span>
                    </a>
                </li>
            </ul>
        </div>
    </li>

