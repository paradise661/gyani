@extends('layouts.admin.master')
@section('title', 'Website Settings')

@section('content')
    @include('admin.includes.message')
    <div class="content">
        <div class="container-fluid">
            <div class="">
                <div class="card-body p-0">
                    <form action="{{ route('admin.setting.update') }}" autocomplete="off" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="card card-primary shadow br-8">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3 col-sm-2 nav flex-column gap-2 nav-pills" id="v-pills-tab"
                                        role="tablist" aria-orientation="vertical">
                                        <button class="nav-link text-start active" id="v-pills-global-tab"
                                            data-bs-toggle="pill" data-bs-target="#v-pills-global" type="button"
                                            role="tab" aria-controls="v-pills-global"
                                            aria-selected="true">Global</button>
                                        <button class="nav-link text-start" id="v-pills-home-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-home" type="button" role="tab"
                                            aria-controls="v-pills-home" aria-selected="false">Homepage</button>
                                        <button class="nav-link text-start" id="v-pills-info-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-info" type="button" role="tab"
                                            aria-controls="v-pills-info" aria-selected="false">Other Titles</button>
                                    </div>
                                    <div class="col-9 col-sm-10 tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-global" role="tabpanel"
                                            aria-labelledby="v-pills-global-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="site_logo">Site Main Logo</label>
                                                        <div class="custom-file">
                                                            <input class="mainlogo" id="site_logo" data-show-remove="false"
                                                                data-default-file="{{ $settings['site_main_logo'] }}"
                                                                type="file" name="site_main_logo">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_logo">Site Footer Logo</label>
                                                        <div class="custom-file">
                                                            <input class="footerlogo" id="site_logo"
                                                                data-show-remove="false"
                                                                data-default-file="{{ $settings['site_footer_logo'] }}"
                                                                type="file" name="site_footer_logo">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="footer_logo">Site Fav Icon</label>
                                                        <div class="custom-file">
                                                            <input class="footerlogo" id="footer_logo"
                                                                data-show-remove="false"
                                                                data-default-file="{{ $settings['site_fav_icon'] }}"
                                                                type="file" name="site_fav_icon">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="site_information">Site Information</label>
                                                        <textarea class="form-control br-8" name="site_information" rows="4" placeholder="Enter Site Information">{{ $settings['site_information'] }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_phone">Phone Number</label>
                                                        <input class="form-control br-8" type="tel" name="site_phone"
                                                            value="{{ $settings['site_phone'] }}"
                                                            placeholder="Enter Phone Number">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_email">Email</label>
                                                        <input class="form-control br-8" type="email" name="site_email"
                                                            value="{{ $settings['site_email'] }}" placeholder="Enter Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_location">Location</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="site_location" value="{{ $settings['site_location'] }}"
                                                            placeholder="Enter Location">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_location_url">Location Url</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="site_location_url"
                                                            value="{{ $settings['site_location_url'] }}"
                                                            placeholder="Enter Location Url">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="officeopen">Office Open</label>
                                                        <input class="form-control br-8" type="text" name="officeopen"
                                                            value="{{ $settings['officeopen'] }}"
                                                            placeholder="Open Mon - Fri">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_facebook">Facebook</label>
                                                        <input class="form-control br-8" type="url"
                                                            name="site_facebook" value="{{ $settings['site_facebook'] }}"
                                                            placeholder="Enter Facebook">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_youtube">Youtube</label>
                                                        <input class="form-control br-8" type="url"
                                                            name="site_youtube" value="{{ $settings['site_youtube'] }}"
                                                            placeholder="Enter Youtube">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_instagram">Instagram</label>
                                                        <input class="form-control br-8" type="url"
                                                            name="site_instagram"
                                                            value="{{ $settings['site_instagram'] }}"
                                                            placeholder="Enter Instagram">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_experiance">Site Experiance</label>
                                                        <textarea class="form-control br-8" name="site_experiance" rows="4" placeholder="Enter Site experiance">{{ $settings['site_experiance'] }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_copyright">Site Copyright</label>
                                                        <textarea class="form-control br-8" name="site_copyright" rows="4" placeholder="Enter Site Copyright">{{ $settings['site_copyright'] }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="v-pills-home" role="tabpanel"
                                            aria-labelledby="v-pills-home-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="homepage_title">Enter Homepage Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="homepage_title"
                                                            value="{{ $settings['homepage_title'] }}"
                                                            placeholder="Enter Homepage Title">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="homepage_image">Enter Homepage Image</label>
                                                        <div class="custom-file">
                                                            <input class="homepageimage" id="homepage_image"
                                                                data-show-remove="false"
                                                                data-default-file="{{ $settings['homepage_image'] }}"
                                                                type="file" name="homepage_image">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="homepage_description">Enter Homepage
                                                            Description</label>
                                                        <textarea class="form-control ckeditor br-8" name="homepage_description" rows="4">{{ $settings['homepage_description'] }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <fieldset class="border p-3 mb-3">
                                                        <legend class="float-none w-auto legend-title">Display Category
                                                        </legend>
                                                        <div class="row">
                                                            <div class="col-md-12 mb-3">
                                                                <label for="homecategory">Select category to display on
                                                                    home</label>
                                                                @if (!empty($settings['homepagecategory']))
                                                                    <div class="d-flex gap-2 my-3">
                                                                        @foreach ($settings['homepagecategory'] as $sethomecat)
                                                                            @php
                                                                                $homecat = App\Models\PackageCategory::find(
                                                                                    $sethomecat,
                                                                                );
                                                                            @endphp
                                                                            @if ($homecat)
                                                                                <span
                                                                                    class="badge bg-success">{{ $homecat->name }}</span>
                                                                            @endif
                                                                        @endforeach
                                                                    </div>
                                                                @endif

                                                                <select class="form-control" id="homecategory"
                                                                    data-trigger name="homepagecategory[]"
                                                                    placeholder="This is a placeholder" multiple>
                                                                    @if ($packagecategories->isNotEmpty())
                                                                        @foreach ($packagecategories as $homecats)
                                                                            <option value="{{ $homecats->id }}">
                                                                                {{ $homecats->name }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="footercategory">Select category to display on
                                                                    footer</label>
                                                                @if (!empty($settings['footercategory']))
                                                                    <div class="d-flex gap-2 my-3">
                                                                        @foreach ($settings['footercategory'] as $setfotcat)
                                                                            <!-- fixed -->
                                                                            @php
                                                                                $footcat = App\Models\PackageCategory::find(
                                                                                    $setfotcat,
                                                                                );
                                                                            @endphp
                                                                            @if ($footcat)
                                                                                <span
                                                                                    class="badge bg-success">{{ $footcat->name }}</span>
                                                                            @endif
                                                                        @endforeach
                                                                    </div>
                                                                @endif

                                                                <select class="form-control" id="footercategory"
                                                                    name="footercategory[]"
                                                                    placeholder="This is a placeholder" multiple>
                                                                    @if ($packagecategories->isNotEmpty())
                                                                        @foreach ($packagecategories as $footercats)
                                                                            <option value="{{ $footercats->id }}">
                                                                                {{ $footercats->name }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-12">
                                                    <fieldset class="border p-3">
                                                        <legend class="float-none w-auto legend-title">SEO</legend>
                                                        <div class="row">

                                                            <div class="col-md-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="homepage_seo_title">Enter Homepage Seo
                                                                        Title</label>
                                                                    <input class="form-control br-8" type="text"
                                                                        name="homepage_seo_title"
                                                                        value="{{ $settings['homepage_seo_title'] }}"
                                                                        placeholder="Enter Homepage Seo Title">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="homepage_seo_keywords">Enter Homepage Seo
                                                                        Keywords</label>
                                                                    <input class="form-control br-8" type="text"
                                                                        name="homepage_seo_keywords"
                                                                        value="{{ $settings['homepage_seo_keywords'] }}"
                                                                        placeholder="Enter Homepage Seo Keywords">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group mb-3">
                                                                    <label for="homepage_seo_description">Enter Homepage
                                                                        Seo Description</label>
                                                                    <textarea class="form-control br-8" name="homepage_seo_description" rows="4">{{ $settings['homepage_seo_description'] }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="v-pills-info" role="tabpanel"
                                            aria-labelledby="v-pills-info-tab">
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="getappoint_small_title">Enter Get Appoint Small
                                                            Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="getappoint_small_title"
                                                            value="{{ $settings['getappoint_small_title'] }}"
                                                            placeholder="Enter Get Appoint Small Title">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="getappoint_title">Enter Get Appoint Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="getappoint_title"
                                                            value="{{ $settings['getappoint_title'] }}"
                                                            placeholder="Enter Get Appoint Title">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="getappoint_description">Enter Get Appoint
                                                            Description</label>
                                                        <textarea class="form-control ckeditor br-8" name="getappoint_description" rows="4">{{ $settings['getappoint_description'] }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="blog_small_title">Enter Blog Small Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="blog_small_title"
                                                            value="{{ $settings['blog_small_title'] }}"
                                                            placeholder="Enter Blog Small Title">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="blog_title">Enter Blog Title</label>
                                                        <input class="form-control br-8" type="text" name="blog_title"
                                                            value="{{ $settings['blog_title'] }}"
                                                            placeholder="Enter Blog Title">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="service_small_title">Enter Service Small Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="service_small_title"
                                                            value="{{ $settings['service_small_title'] }}"
                                                            placeholder="Enter Service Small Title">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="service_title">Enter Service Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="service_title" value="{{ $settings['service_title'] }}"
                                                            placeholder="Enter Service Title">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="faq_image">Enter Service Image</label>
                                                        <div class="custom-file">
                                                            <input class="serviceimage" id="service_image"
                                                                data-show-remove="false"
                                                                data-default-file="{{ $settings['service_image'] }}"
                                                                type="file" name="service_image">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="price_small_title">Enter Price Small Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="price_small_title"
                                                            value="{{ $settings['price_small_title'] }}"
                                                            placeholder="Enter Price Small Title">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="price_title">Enter Price Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="price_title" value="{{ $settings['price_title'] }}"
                                                            placeholder="Enter Price Title">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="gallery_small_title">Enter Gallery Small Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="gallery_small_title"
                                                            value="{{ $settings['gallery_small_title'] }}"
                                                            placeholder="Enter allery Small Title">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="gallery_title">Enter Gallery Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="gallery_title" value="{{ $settings['gallery_title'] }}"
                                                            placeholder="Enter Gallery Title">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="review_small_title">Enter Review Small Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="review_small_title"
                                                            value="{{ $settings['review_small_title'] }}"
                                                            placeholder="Enter Review Small Title">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="review_title">Enter Review Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="review_title" value="{{ $settings['review_title'] }}"
                                                            placeholder="Enter Review Title">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="team_small_title">Enter Team Small Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="team_small_title"
                                                            value="{{ $settings['team_small_title'] }}"
                                                            placeholder="Enter Team Small Title">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="team_title">Enter Team Title</label>
                                                        <input class="form-control br-8" type="text" name="team_title"
                                                            value="{{ $settings['team_title'] }}"
                                                            placeholder="Enter Team Title">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="faq_small_title">Enter Faq Small Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="faq_small_title"
                                                            value="{{ $settings['faq_small_title'] }}"
                                                            placeholder="Enter Faq Small Title">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="faq_title">Enter Faq Title</label>
                                                        <input class="form-control br-8" type="text" name="faq_title"
                                                            value="{{ $settings['faq_title'] }}"
                                                            placeholder="Enter Faq Title">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="faq_image">Enter FAQ Image</label>
                                                        <div class="custom-file">
                                                            <input class="faqimage" id="faq_image"
                                                                data-show-remove="false"
                                                                data-default-file="{{ $settings['faq_image'] }}"
                                                                type="file" name="faq_image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footers">
                                    <button class="btn btn-lg btn-primary" type="submit"><i
                                            class="fa-solid fa-rotate"></i> Update Setting</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('admin/assets/vendor/libs/choices/scripts/choices.min.js') }}"></script>

    <script>
        var multipleCancelButton = new Choices(
            '#homecategory', {
                allowHTML: true,
                removeItemButton: true,
            }
        );
        var multipleCategory = new Choices(
            '#footercategory', {
                allowHTML: true,
                removeItemButton: true,
                fuseOptions: {
                    includeScore: true
                },
            }
        );
    </script>
@endsection
