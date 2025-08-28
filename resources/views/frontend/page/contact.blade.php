@extends('layouts.frontend.master')

@section('seo')
    @include('frontend.global.seo', [
        'title' => $content->seo_title ?? '',
        'description' => $content->seo_description ?? '',
        'keyword' => $content->seo_keywords ?? '',
        'schema' => $content->seo_schema ?? '',
    ])
@endsection

@section('content')
    @include('frontend.global.banner', [
        'name' => $content->name,
        'banner' => $content->banner,
        'parentname' => '',
        'parentlink' => '',
    ])

    <section class="booking-area p-relative my-5" id="booking">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="contact-bg">
                        <div class="section-title center-align mb-3">
                            <h2>GET IN CONTACT</h2>
                        </div>
                        <form class="ontact-form mt-30" id="contactus">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-lg-12">
                                    <div class="contact-field p-relative c-name mb-20">
                                        <input class="form-control @error('name') is-invalid @enderror" id="name"
                                            type="text" name="name" placeholder="Enter Your Name">
                                        <span class="text-primary">
                                            <strong id="contact-name-error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <div class="contact-field p-relative c-subject mb-20">
                                        <input id="email"class="form-control @error('email') is-invalid @enderror"
                                            type="email" name="email" placeholder="Enter Your Email">
                                        <span class="text-primary">
                                            <strong id="contact-email-error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <div class="contact-field p-relative c-subject mb-20">
                                        <input id="phone"class="form-control @error('phone') is-invalid @enderror"
                                            type="text" name="phone" placeholder="Enter Your Phone">
                                        <span class="text-primary">
                                            <strong id="contact-phone-error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="contact-field p-relative c-message">
                                        <textarea id="message"class="form-control @error('message') is-invalid @enderror" name="message" cols="30"
                                            rows="10" placeholder="Write comments"></textarea>
                                        <span class="text-primary">
                                            <strong id="contact-message-error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <input id="g-recaptcha-response" type="hidden" name="g-recaptcha-response">
                                    <button class="btn btn-primary-200 text-white px-4 py-2" id="contact-submit"
                                        type="submit">Submit <span class="d-none" id="loader"><i
                                                class="fas fa-sync fa-spin"></i></span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="opening-time">
                        <div class="open-img">
                            <img src="{{ asset($content->image) }}" alt="{{ $content->name ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="map fix" style="background: #f5f5f5;">
        <div class="container-flud">
            <div class="row">
                <div class="col-lg-12">
                    <iframe src="{{ $setting['site_location_url'] ?? '' }}" width="100%" height="450" style="border:0;"
                        allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
