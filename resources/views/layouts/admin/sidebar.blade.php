<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo p-0">
        <a href="{{ route('home') }}" target="_blank" class="app-brand-link my-0 mx-auto">
            @if($setting['site_main_logo'])                
                <img style="" src="{{ asset($setting['site_main_logo']) }}" alt="hamrocoop" height="50">
            @else
                <span class="app-brand-text demo menu-text fw-bolder ms-2">Nepal Holiday</span>
            @endif
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-item @if (Request::segment(2) == 'contacts' || Request::segment(2) == 'booking') {{ 'active open' }} @endif">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-notepad"></i>
                <div data-i18n="General Setting">Site Form</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('contacts.index') }}"
                        class="menu-link {{ Request::segment(2) == 'contacts' ? 'active' : '' }}">
                        <i class="menu-icon tf-icons bx bxs-contact"></i>
                        <div data-i18n="Accordion">Inquiries</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('booking.index') }}"
                        class="menu-link {{ Request::segment(2) == 'booking' ? 'active' : '' }}">
                        <i class="menu-icon tf-icons bx bx-calendar"></i>
                        <div data-i18n="Accordion">Booking</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item @if (Request::segment(2) == 'menus') {{ 'active open' }} @endif"">
            <a href="{{ route('admin.menu.index') }}"
                class="menu-link {{ Request::segment(2) == 'menus' ? 'active' : '' }}">
                <i class="menu-icon tf-icons bx bx-menu-alt-right"></i>
                <div data-i18n="Accordion">Menu</div>
            </a>
        </li>

        <!-- CMS -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">CMS</span></li>
        <!-- Cards -->
        <li class="menu-item @if (Request::segment(2) == 'blog') {{ 'active open' }} @endif">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-news"></i>
                <div data-i18n="General Setting">Posts</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('blog.index') }}"
                        class="menu-link {{ (Request::segment(2) == 'blog'&&Request::segment(3) == '') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons bx bx-news"></i>
                        <div data-i18n="Accordion">All Posts</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('blog.create') }}"
                        class="menu-link {{ (Request::segment(2) == 'blog' && Request::segment(3) == 'create') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                        <div data-i18n="Accordion">Create Post</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item @if (Request::segment(2) == 'page') {{ 'active open' }} @endif">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="General Setting">Pages</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('page.index') }}"
                        class="menu-link {{ (Request::segment(2) == 'page'&&Request::segment(3) == '') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons bx bx-file"></i>
                        <div data-i18n="Accordion">All Pages</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('page.create') }}"
                        class="menu-link {{ (Request::segment(2) == 'page' && Request::segment(3) == 'create') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                        <div data-i18n="Accordion">Create Page</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item @if (Request::segment(2) == 'packages' || Request::segment(2) == 'packagecategories') {{ 'active open' }} @endif">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <div data-i18n="General Setting">Packages</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('packages.index') }}"
                        class="menu-link {{ (Request::segment(2) == 'packages'&&Request::segment(3) == '') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons bx bx-package"></i>
                        <div data-i18n="Accordion">All Packages</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('packages.create') }}"
                        class="menu-link {{ (Request::segment(2) == 'packages' && Request::segment(3) == 'create') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons bx bx-plus"></i>
                        <div data-i18n="Accordion">Create Package</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('packagecategories.index') }}"
                        class="menu-link {{ (Request::segment(2) == 'packagecategories') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons bx bx-category-alt"></i>
                        <div data-i18n="Accordion">Package Category</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item @if (Request::segment(2) == 'review') {{ 'active open' }} @endif">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-quote-alt-left"></i>
                <div data-i18n="General Setting">Reviews</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('review.index') }}"
                        class="menu-link {{ (Request::segment(2) == 'review'&&Request::segment(3) == '') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons bx bxs-quote-alt-left"></i>
                        <div data-i18n="Accordion">All Reviews</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('review.create') }}"
                        class="menu-link {{ (Request::segment(2) == 'review' && Request::segment(3) == 'create') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                        <div data-i18n="Accordion">Create Review</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item @if (Request::segment(2) == 'members') {{ 'active open' }} @endif">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user-pin"></i>
                <div data-i18n="General Setting">Teams</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('members.index') }}"
                        class="menu-link {{ (Request::segment(2) == 'members'&&Request::segment(3) == '') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons bx bx-user-pin"></i>
                        <div data-i18n="Accordion">All Teams</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('members.create') }}"
                        class="menu-link {{ (Request::segment(2) == 'members' && Request::segment(3) == 'create') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons bx bxs-user-plus"></i>
                        <div data-i18n="Accordion">Create Team</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item @if (Request::segment(2) == 'services') {{ 'active open' }} @endif">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-analyse"></i>
                <div data-i18n="General Setting">Services</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('services.index') }}"
                        class="menu-link {{ (Request::segment(2) == 'services'&&Request::segment(3) == '') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons bx bx-analyse"></i>
                        <div data-i18n="Accordion">All Services</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('services.create') }}"
                        class="menu-link {{ (Request::segment(2) == 'services' && Request::segment(3) == 'create') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                        <div data-i18n="Accordion">Create Service</div>
                    </a>
                </li>

            </ul>
        </li>

        <li class="menu-item @if (Request::segment(2) == 'faq') {{ 'active open' }} @endif">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-question-mark"></i>
                <div data-i18n="General Setting">Faqs</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('faq.index') }}"
                        class="menu-link {{ (Request::segment(2) == 'faq'&&Request::segment(3) == '') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons bx bx-question-mark"></i>
                        <div data-i18n="Accordion">All Faqs</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('faq.create') }}"
                        class="menu-link {{ (Request::segment(2) == 'faq' && Request::segment(3) == 'create') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                        <div data-i18n="Accordion">Create Faq</div>
                    </a>
                </li>

            </ul>
        </li>

        <li class="menu-item @if (Request::segment(2) == 'slider') {{ 'active open' }} @endif">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-slider-alt"></i>
                <div data-i18n="General Setting">Sliders</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('slider.index') }}"
                        class="menu-link {{ (Request::segment(2) == 'slider'&&Request::segment(3) == '') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons bx bx-slider-alt"></i>
                        <div data-i18n="Accordion">All Sliders</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('slider.create') }}"
                        class="menu-link {{ (Request::segment(2) == 'slider' && Request::segment(3) == 'create') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                        <div data-i18n="Accordion">Create Slider</div>
                    </a>
                </li>

            </ul>
        </li>

        <!-- General Settings  -->
        <li class="menu-item @if (Request::segment(2) == 'setting' ||
            Request::segment(2) == 'popup'||
            Request::segment(2) == 'galleries') {{ 'active open' }} @endif">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="General Setting">Global Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.setting.index') }}"
                        class="menu-link {{ Request::segment(2) == 'setting' ? 'active' : '' }}">
                        <i class="menu-icon tf-icons bx bx-cog"></i>
                        <div data-i18n="Accordion">Setting</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('galleries.index') }}"
                        class="menu-link {{ Request::segment(2) == 'galleries' ? 'active' : '' }}">
                        <i class="menu-icon tf-icons bx bx-images"></i>
                        <div data-i18n="Accordion">Gallery</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('popup.index') }}"
                        class="menu-link {{ Request::segment(2) == 'popup' ? 'active' : '' }}">
                        <i class="menu-icon tf-icons bx bx-image"></i>
                        <div data-i18n="Accordion">Popup</div>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</aside>
