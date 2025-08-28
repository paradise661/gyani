<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="google-site-verification" content="uDU_d-rLl2HfHDwhQy5Vpg3aroRpzgfKNYcs8X1NE78" />
    <link rel="shortcut icon" href="{{ asset($setting['site_fav_icon'] ?? 'frontend/images/logo.png') }}"
        type="image/x-icon">
    <link rel="icon" href="{{ asset($setting['site_fav_icon'] ?? 'frontend/images/logo.png') }}"
        type="image/x-icon">
    @yield('seo')
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-261150258-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-261150258-1');
    </script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ME6GYX5VLX"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-ME6GYX5VLX');
    </script>
    <script type="application/ld+json">
    {
    "@context": "http://schema.org",
    "@type": "TravelAgency",
    "name": "The Nepal Holidays",
    "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.5",
        "bestRating": "5",
        "worstRating": "1",
        "ratingCount": "100"
        },
    "address": {
        "@type": "PostalAddress",
        "streetAddress": "P899+W2G ",
        "addressLocality": "Lazimpath",
        "addressRegion": "Kathmandu",
        "postalCode": "44600",
        "addressCountry": "Nepal"
        }
    }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/meanmenu.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"
        type="text/css" media="screen" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.css" />
    <style>
        .toast-success {
            background-color: #26b3f7;
        }
    </style>
    <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_V3_SITE_KEY') }}"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute({{ env('RECAPTCHA_V3_SITE_KEY') }}, {
                action: 'submit'
            }).then(function(token) {
                document.getElementById('g-recaptcha-response').value = token;
            });
        });
    </script>
</head>

<body>
    @include('layouts.frontend.header')

    @yield('content')

    @include('layouts.frontend.footer')

    <script src="{{ asset('frontend') }}/assets/js/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/bootstrap.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/wow.min.js"></script>
    <script src="{{ asset('frontend/assets/js/jquery.meanmenu.min.js') }}"></script>
    <!-- fancybox image-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js">
    </script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" referrerpolicy="no-referrer">
    </script>
    <!-- toastr ends-->
    <script src="{{ asset('frontend') }}/assets/js/index.js"></script>
    @yield('script')

    <script>
        $('#contact-submit').click(function(e) {
            e.preventDefault();

            var contactusData = new FormData($('#contactus')[0]);
            $('#contact-name-error').html("");
            $('#contact-email-error').html("");
            $('#contact-phone-error').html("");
            $('#contact-message-error').html("");

            $.ajax({
                url: "{{ route('popupinquiry') }}",
                method: 'POST',
                data: contactusData,
                processData: false,
                cache: false,
                contentType: false,
                beforeSend: function() {
                    $('#loader').show();
                },
                success: function(data) {
                    if (data.errors) {
                        if (data.errors.name) {
                            $('#contact-name-error').html('*' + data.errors.name[0]);
                        }
                        if (data.errors.email) {
                            $('#contact-email-error').html('*' + data.errors.email[0]);
                        }
                        if (data.errors.phone) {
                            $('#contact-phone-error').html('*' + data.errors.phone[0]);
                        }
                        if (data.errors.message) {
                            $('#contact-message-error').html('*' + data.errors.message[0]);
                        }
                    }

                    if (data.success) {
                        $('#loader').hide();
                        toastr.success(data.success);
                        $('#popcontactus').modal('hide');
                        $('#contactus')[0].reset();
                    }

                },
                error: function() {
                    $('#loader').hide();
                    alert("Some Problems Occured");
                }
            });
        })

        $('#bookingsubmit').click(function(e) {
            e.preventDefault();

            var bookingData = new FormData($('#booking')[0]);
            $('#name-error').html("");
            $('#email-error').html("");
            $('#phone-error').html("");
            $('#country-error').html("");
            $('#traveldate-error').html("");
            $('#adults-error').html("");
            $('#childs-error').html("");
            $('#departure_city-error').html("");
            $('#duration-error').html("");
            $('#message-error').html("");

            $.ajax({
                url: "{{ route('popupbook') }}",
                method: 'POST',
                data: bookingData,
                processData: false,
                cache: false,
                contentType: false,
                beforeSend: function() {
                    $('#loader').show();
                },
                success: function(data) {
                    if (data.errors) {
                        if (data.errors.name) {
                            $('#name-error').html('*' + data.errors.name[0]);
                        }
                        if (data.errors.email) {
                            $('#email-error').html('*' + data.errors.email[0]);
                        }
                        if (data.errors.phone) {
                            $('#phone-error').html('*' + data.errors.phone[0]);
                        }
                        if (data.errors.country) {
                            $('#country-error').html('*' + data.errors.country[0]);
                        }
                        if (data.errors.traveldate) {
                            $('#traveldate-error').html('*' + data.errors.traveldate[0]);
                        }
                        if (data.errors.adults) {
                            $('#adults-error').html('*' + data.errors.adults[0]);
                        }
                        if (data.errors.childs) {
                            $('#childs-error').html('*' + data.errors.childs[0]);
                        }
                        if (data.errors.departure_city) {
                            $('#departure_city-error').html('*' + data.errors.departure_city[0]);
                        }
                        if (data.errors.duration) {
                            $('#duration-error').html('*' + data.errors.duration[0]);
                        }
                        if (data.errors.message) {
                            $('#message-error').html('*' + data.errors.message[0]);
                        }
                    }

                    if (data.success) {
                        $('#loader').hide();
                        toastr.success(data.success);
                        $('#enquirenow').modal('hide');
                        $('#booking')[0].reset();
                    }
                },
                error: function() {
                    $('#loader').hide();
                    alert("Some Problems Occured");
                }
            });
        })
    </script>
</body>

</html>
