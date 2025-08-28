<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PackageCategory;
use App\Models\Setting;
use Session;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        $settings = Setting::pluck('value', 'key');
        $packagecategories = PackageCategory::where('status', 1)->get();
        return view('admin.setting.edit', compact(['settings', 'packagecategories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $siteSettings = Setting::pluck('value', 'key');

        $siteSetting = $request->all();

        $site_main_logo = updatesettingmedia($request, 'site_main_logo', 'main_logo');
        $site_footer_logo = updatesettingmedia($request, 'site_footer_logo', 'footer_logo');
        $site_fav_icon = updatesettingmedia($request, 'site_fav_icon', 'fav_logo');
        $homepage_image = updatesettingmedia($request, 'homepage_image', 'home');
        $faq_image = updatesettingmedia($request, 'faq_image', 'faq');
        $service_image = updatesettingmedia($request, 'service_image', 'service');

        $siteSetting['site_main_logo'] = deletesettingmedia($site_main_logo, $siteSettings['site_main_logo'], 'site_main_logo', $siteSetting, $siteSettings);
        $siteSetting['site_footer_logo'] = deletesettingmedia($site_footer_logo, $siteSettings['site_footer_logo'], 'site_footer_logo', $siteSetting, $siteSettings);
        $siteSetting['site_fav_icon'] = deletesettingmedia($site_fav_icon, $siteSettings['site_fav_icon'], 'site_fav_icon', $siteSetting, $siteSettings);
        $siteSetting['homepage_image'] = deletesettingmedia($homepage_image, $siteSettings['homepage_image'], 'homepage_image', $siteSetting, $siteSettings);
        $siteSetting['faq_image'] = deletesettingmedia($faq_image, $siteSettings['faq_image'], 'faq_image', $siteSetting, $siteSettings);
        $siteSetting['service_image'] = deletesettingmedia($service_image, $siteSettings['service_image'], 'service_image', $siteSetting, $siteSettings);

        foreach ($siteSetting as $key => $value) {
            $setting->updateOrCreate(['key' => $key,], [
                'key' => $key,
                'value' => $value,
            ]);
        }

        Session::flash('success', 'Setting updated successfully');
        return redirect()->back();
    }
}
