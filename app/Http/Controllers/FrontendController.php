<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Gallery;
use App\Models\ItenaryPackage;
use App\Models\Member;
use App\Models\News;
use App\Models\Package;
use App\Models\PackageCategory;
use App\Models\PackageFaq;
use App\Models\PackageGlobal;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Popup;
use App\Models\Review;
use App\Models\Services;
use App\Models\Setting;
use App\Models\Sliders;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use PDF;

class FrontendController extends Controller
{
    public function home()
    {
        $sliders = Sliders::oldest('order')->get();
        $settings = Setting::pluck('value', 'key');
        $popups = Popup::where('status', 1)->oldest('order')->get();
        if ($settings['homepagecategory']) {
            $firstcats = PackageCategory::where('id', $settings['homepagecategory'][0])->first();
        } else {
            $firstcats = [];
        }

        return view('frontend.home.index', compact(['sliders', 'firstcats', 'popups']));
    }

    public function blogsingle($slug)
    {
        $content = News::where('slug', $slug)->where('status', 1)->first();
        if ($content) {
            $blogs = News::where('status', 1)->where('id', '!=', $content->id)->limit(5)->get();
            return view('frontend.blog.show', compact(['content', 'blogs']));
        } else {
            return view('errors.404');
        }
    }

    public function packagesingle($slug)
    {
        $content = Package::where('slug', $slug)->where('status', 1)->first();
        if ($content) {
            $itineraries = ItenaryPackage::with('itineraryitem')->where('package_id', $content->id)->get();
            $packages = Package::where('status', 1)->where('id', '!=', $content->id)->limit(5)->get();
            $globalinfo = PackageGlobal::where('package_id', $content->id)->first();
            $faqs = PackageFaq::where('package_id', $content->id)->oldest('order')->get();
            return view('frontend.package.show', compact(['content', 'globalinfo', 'itineraries', 'faqs']));
        } else {
            return view('errors.404');
        }
    }

    public function categorysingle($slug)
    {
        $content = PackageCategory::where('slug', $slug)->where('status', 1)->first();
        if ($content) {
            $packages = Package::whereHas('category', function ($q) use ($slug) {
                $q->where('package_categories.slug', '=', $slug);
            })->get();
            return view('frontend.category.show', compact(['content', 'packages']));
        } else {
            return view('errors.404');
        }
    }

    public function pagesingle($slug)
    {
        $content = Page::where('slug', $slug)->where('status', 1)->first();
        if ($content) {
            if ($content->template == 1) {

                return view('frontend.page.side', compact('content'));
            } elseif ($content->template == 2) {

                $teams = Member::where('status', 1)->where('feature', 1)->oldest('order')->limit(5)->get();
                $faqs = Faq::where('status', 1)->oldest('order')->limit(4)->get();
                $reviews = Review::where('status', 1)->oldest('order')->limit(8)->get();

                return view('frontend.page.all', compact(['content', 'teams', 'faqs', 'reviews']));
            } elseif ($content->template == 3) {

                $teams = Member::where('status', 1)->oldest('order')->get();
                return view('frontend.page.team', compact(['content', 'teams']));
            } elseif ($content->template == 4) {

                $reviews = Review::where('status', 1)->oldest('order')->get();
                return view('frontend.page.review', compact(['content', 'reviews']));
            } elseif ($content->template == 5) {

                $faqs = Faq::where('status', 1)->oldest('order')->get()->toArray();
                return view('frontend.page.faq', compact(['content', 'faqs']));
            } elseif ($content->template == 6) {

                $partners = Partner::where('status', 1)->oldest('order')->get();
                return view('frontend.page.partner', compact(['content', 'partners']));
            } elseif ($content->template == 8) {

                $gallerys = Gallery::get();
                return view('frontend.page.gallery', compact(['content', 'gallerys']));
            } elseif ($content->template == 9) {

                return view('frontend.page.contact', compact('content'));
            } elseif ($content->template == 10) {

                $blogs = News::where('status', 1)->latest()->get();
                return view('frontend.page.blog', compact(['content', 'blogs']));
            } elseif ($content->template == 11) {

                $allservices = Services::where('status', 1)->get();
                return view('frontend.page.service', compact(['content', 'allservices']));
            } elseif ($content->template == 14) {

                $all_packs = Package::where('status', 1)->get();
                return view('frontend.page.package', compact(['content', 'all_packs']));
            } elseif ($content->template == 15) {

                $all_cats = PackageCategory::where('status', 1)->oldest('order')->get();
                return view('frontend.page.category', compact(['content', 'all_cats']));
            } elseif ($content->template == 13) {
                return view('frontend.page.booking', compact(['content']));
            } elseif ($content->template == 16) {
                $all_blogs = News::where('status', 1)->get();
                $all_pages = Page::where('status', 1)->get();
                $all_cats = PackageCategory::where('status', 1)->get();
                $all_packs = Package::where('status', 1)->get();
                $all_services = Services::where('status', 1)->get();
                return response()->view('frontend.page.sitemap', compact(['all_blogs', 'all_pages', 'all_cats', 'all_packs', 'all_services']))->header('Content-Type', 'text/xml');
            } else {

                return view('frontend.page.default', compact('content'));
            }
        } else {
            return view('errors.404');
        }
    }

    public function servicesingle($slug)
    {
        $content = Services::where('slug', $slug)->where('status', 1)->first();
        if ($content) {
            $services = Services::where('status', 1)->get();
            return view('frontend.service.show', compact(['content', 'services']));
        } else {
            return view('errors.404');
        }
    }

    public function printPdf(Package $package)
    {
        $url = url()->previous();
        $itineraries = ItenaryPackage::with('itineraryitem')->where('package_id', $package->id)->get();
        $globalinfo = PackageGlobal::where('package_id', $package->id)->first();
        $faqs = PackageFaq::where('package_id', $package->id)->oldest('order')->get();
        $pdf = PDF::loadView('frontend.package.print', compact('globalinfo', 'itineraries', 'faqs', 'package', 'url'));
        return $pdf->download($package->name . '.pdf');
        // return  $pdf->stream($package->name . '.pdf', array("Attachment" => false));
    }
}
