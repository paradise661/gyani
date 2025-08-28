<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Http\Requests\Admin\StoreGlobalRequest;
use App\Http\Requests\Admin\UpdateGlobalRequest;
use Session;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = Page::latest()->paginate(20);
        return view('admin.page.index', compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGlobalRequest $request)
    {
        $input = $request->all();
        $input['image'] = fileUpload($request, 'image', 'page');
        $input['banner'] = fileUpload($request, 'banner', 'page');
        $input['seo_title'] = $request->seo_title ?? $request->name;
        $slug = make_slug($request->name);
        $page =  Page::create($input);
        $page->update(['slug' => $slug]);
        return redirect()->route('page.edit', $page->id)->with('message', 'Created Successfully');
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
    public function edit(Page $page)
    {
        return view('admin.page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGlobalRequest $request, Page $page)
    {
        $old_image = $page->image;
        $old_banner = $page->banner;
        $input = $request->all();
        $image = fileUpload($request, 'image', 'page');
        $banner = fileUpload($request, 'banner', 'page');

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
        $page->update($input);
        return redirect()->route('page.edit', $page->id)->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        removeFile($page->image);
        $page->delete();
        return redirect()->route('page.index')->with('message', 'Delete Successfully');
    }
}
