<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGlobalRequest;
use App\Http\Requests\Admin\UpdateGlobalRequest;
use App\Models\PackageCategory;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

class PackageCategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packagecategories = PackageCategory::latest()->paginate(20);
        return view('admin.packagecategory.index', compact('packagecategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.packagecategory.create');
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
        $input['image'] = fileUpload($request, 'image', 'packagecategory');
        $packagecategory =  PackageCategory::create($input);
        $packagecategory->update(['slug' => Str::slug($request->name)]);
        return redirect()->route('packagecategories.edit', $packagecategory->id)->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PackageCategory $packagecategory)
    {
        return view('admin.packagecategory.edit', compact('packagecategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGlobalRequest $request, PackageCategory $packagecategory)
    {
        $old_image = $packagecategory->image;
        $input = $request->all();
        $image = fileUpload($request, 'image', 'packagecategory');

        if ($image) {
            removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }

        $input['slug'] = $request->slug ? make_slug($request->slug) : make_slug($request->name);
        $packagecategory->update($input);
        return redirect()->route('packagecategories.edit', $packagecategory->id)->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PackageCategory $packagecategory)
    {
        removeFile($packagecategory->image);
        $packagecategory->delete();
        return redirect()->route('packagecategories.index')->with('message', 'Delete Successfully');
    }
}
