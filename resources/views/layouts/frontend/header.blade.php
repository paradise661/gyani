<!--top start-->
<section class="top">
    <div class="container">
        <div class="row justify-content-between ">
            <div class="col-md-6 col-sm-12">
                <div class="d-flex gap-1 justify-content-start">
                    <div class="ph d-flex align-items-center gap-1">
                        <i class="fa-solid fa-envelope"></i>
                        <p>{{ $setting['site_email'] ?? '' }}</p>
                    </div>
                    <div class="ph d-flex align-items-center gap-1">
                        <i class="fa-solid fa-phone"></i>
                        <p>{{ $setting['site_phone'] ?? '' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="d-flex gap-1 justify-content-md-end justify-content-between">
                    <div class="ph d-flex align-items-center gap-1">
                        <i class="fa-solid fa-location-dot"></i>
                        <p>{{ $setting['site_location'] ?? '' }}</p>
                    </div>
                    <div class="d-flex gap-1">
                        <i class="fa-regular fa-clock"></i>
                        <p>{{ $setting['officeopen'] ?? '' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<header class="container main-header ">

    <!-- Main box -->
    <div class="main-box">

        <div class="logo-box">

            <div class="logo">
                <a href="{{ route('home') }}">
                    <img class="img-fluid" src="{{ asset($setting['site_main_logo']) }}" alt="Gyani Holidays">
                </a>
            </div>

        </div>

        <!--Nav Box-->
        <div class="nav-outer">

            <nav class="nav main-menu">
                @php
                    $menus = getMenus(1);
                @endphp
                @if ($menus)
                    <ul class="navigation">
                        @foreach ($menus as $key => $value)
                            @php
                                $mainclass = isset($value->children) ? 'class=dropdown' : '';
                            @endphp
                            <li {{ $mainclass }}>
                                <a href="{{ $value->slug }}"
                                    target="{{ $value->target ?? '_self' }}">{{ $value->title }}</a>
                                @if (isset($value->children))
                                    <ul>
                                        @foreach ($value->children as $key => $child)
                                            @foreach ($child as $key => $data)
                                                @php
                                                    $subclass = isset($data->children) ? 'class=dropdown' : '';
                                                @endphp
                                                <li {{ $subclass }}>
                                                    <a href="{{ $data->slug }}"
                                                        target="{{ $data->target ?? '_self' }}">{{ $data->title }}</a>
                                                    @if (isset($data->children))
                                                        <ul>
                                                            @foreach ($data->children as $key => $subchild)
                                                                @foreach ($subchild as $key => $subdata)
                                                                    <li>
                                                                        <a href="{{ $subdata->slug }}"
                                                                            target="{{ $subdata->target ?? '_self' }}">{{ $subdata->title }}</a>
                                                                    </li>
                                                                @endforeach
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </nav>
            <!-- Main Menu End-->

            <div class="outer-box">
                {{-- <a class="info-btn"
                    href="tel:{{ preg_replace('/\D/', '', $setting['site_phone'] ?? '989 898 9898') }}">
                    <i class="icon fa fa-phone"></i>
                    <small>Call Anytime</small><br> {{ $setting['site_phone'] ?? '989 898 9898' }}
                </a> --}}

                <div class="ui-btn-outer">
                </div>

                <a class="btn btn-sm btn-primary-200 text-white px-4 py-2" data-bs-toggle="modal"
                    data-bs-target="#enquirenow" href="#">Book Now</a>

                <!-- Mobile Nav toggler -->
                <div class="mobile-nav-toggler"><i class="fa-solid fa-bars"></i></div>
            </div>
        </div>
    </div>
    <!-- End Main Box -->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>

        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
        <nav class="menu-box">
            <div class="upper-box">
                <div class="nav-logo"><a href="{{ route('home') }}"><img src="{{ asset($setting['site_main_logo']) }}"
                            alt="Gyani Holidays"></a></div>
                <div class="close-btn"><i class="icon fa fa-times"></i></div>
            </div>

            <ul class="navigation clearfix">
                <!--Keep This Empty / Menu will come through Javascript-->
            </ul>
            <ul class="contact-list-one">
                <li>
                    <!-- Contact Info Box -->
                    <div class="contact-info-box">
                        <i class="icon lnr-icon-phone-handset"></i>
                        <span class="title">Call Now</span>
                        <a
                            href="tel:{{ preg_replace('/\D/', '', $setting['site_phone'] ?? '989 898 9898') }}">{{ $setting['site_phone'] ?? '989 898 9898' }}</a>
                    </div>
                </li>
                <li>
                    <!-- Contact Info Box -->
                    <div class="contact-info-box">
                        <span class="icon lnr-icon-envelope1"></span>
                        <span class="title">Send Email</span>
                        <a href="mailto:{{ $setting['site_email'] }}">{{ $setting['site_email'] }}</a>
                    </div>
                </li>
                <li>
                    <!-- Contact Info Box -->
                    <div class="contact-info-box">
                        <span class="icon lnr-icon-location"></span>
                        <span class="title">Our Location</span>
                        {{ $setting['site_location'] }}
                    </div>
                </li>
            </ul>

            <ul class="social-links">
                <li><a href="{{ $setting['site_facebook'] ?? 'javascript:void(0)' }}"
                        target="{{ $setting['site_facebook'] ? '_blank' : '_self' }}"><i
                            class="fab fa-facebook-f"></i></a></li>
                <li><a href="{{ $setting['site_youtube'] ?? 'javascript:void(0)' }}"
                        target="{{ $setting['site_youtube'] ? '_blank' : '_self' }}"><i class="fab fa-youtube"></i></a>
                </li>
                <li><a href="{{ $setting['site_instagram'] ?? 'javascript:void(0)' }}"
                        target="{{ $setting['site_instagram'] ? '_blank' : '_self' }}"><i
                            class="fab fa-instagram"></i></a></li>
            </ul>
        </nav>
    </div><!-- End Mobile Menu -->

    <!-- Sticky Header  -->
    <div class="sticky-header">
        <div class="container">
            <div class="inner-container">
                <!--Logo-->
                <div class="logo">
                    <a href="{{ route('home') }}" title=""><img src="{{ asset($setting['site_main_logo']) }}"
                            alt="Gyani Holidays"></a>
                </div>

                <!--Right Col-->
                <div class="nav-outer">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-collapse show collapse clearfix">
                            <ul class="navigation clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </ul>
                        </div>
                    </nav><!-- Main Menu End-->

                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler"><i class="fa-solid fa-bars"></i></div>
                </div>
            </div>
        </div>
    </div><!-- End Sticky Menu -->
</header>
