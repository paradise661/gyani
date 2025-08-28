<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use App\Http\Requests\Admin\StoreServicesRequest;
use App\Http\Requests\Admin\UpdateServicesRequest;
use Session;
use File;
use Illuminate\Support\Str;
use PHPUnit\Framework\Error\Notice;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Services::latest()->paginate(20);
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServicesRequest $request)
    {
        $input = $request->all();
        $input['image'] = fileUpload($request, 'image', 'services');
        $input['banner'] = fileUpload($request, 'banner', 'services');
        $input['seo_title'] = $request->seo_title ?? $request->name;
        $slug = make_slug($request->name);
        $services =  Services::create($input);
        $services->update(['slug' => $slug]);
        return redirect()->route('services.edit', $services->id)->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Services $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServicesRequest $request, Services $service)
    {
        $old_image = $service->image;
        $old_banner = $service->banner;
        $input = $request->all();
        $image = fileUpload($request, 'image', 'services');
        $banner = fileUpload($request, 'banner', 'services');

        if ($image) {
            removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }
        if ($banner) {
            removeFile($old_banner);
            $input['banner'] = $banner;
        } else {
            unset($input['banner']);
        }

        $input['slug'] = $request->slug ? make_slug($request->slug) : make_slug($request->name);
        $input['seo_title'] = $request->seo_title ?? $request->name;
        $service->update($input);
        return redirect()->route('services.edit', $service->id)->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Services $service)
    {
        removeFile($service->image);
        $service->delete();
        return redirect()->route('services.index')->with('message', 'Delete Successfully');
    }
}
