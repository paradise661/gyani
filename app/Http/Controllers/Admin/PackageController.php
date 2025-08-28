<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePackageRequest;
use App\Http\Requests\Admin\UpdatePackageRequest;
use App\Models\GalleryPackage;
use App\Models\Package;
use App\Models\PackageCategory;
use App\Models\PackageGlobal;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::latest()->paginate(20);
        return view('admin.package.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packagecategories = PackageCategory::where('status', 1)->get();
        return view('admin.package.create', compact('packagecategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePackageRequest $request)
    {
        $input = $request->all();
        $input['image'] = fileUpload($request, 'image', 'package');
        $input['banner_image'] = fileUpload($request, 'banner_image', 'package');
        $package =  Package::create($input);

        $pckg_global = $request->all();
        $pckg_global['package_id'] = $package->id;
        PackageGlobal::create($pckg_global);

        $package->update(['slug' => Str::slug($request->name)]);
        //attach destinations
        $package->category()->attach($request->category_ids);

        return redirect()->route('packages.edit', $package->id);
    }

    /**
     * Display the specified resource. Riyan 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        return view('admin.package.show', compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        $packagecategories = PackageCategory::where('status', 1)->get();
        $checkcategory = $package->category()->pluck('category_id')->toArray();
        $globalinfo = $package->globalinfo;
        $packageItenary = $package->itenaries;
        return view('admin.package.edit', compact('package', 'checkcategory', 'packagecategories', 'packageItenary', 'globalinfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePackageRequest $request, Package $package)
    {
        $old_image = $package->image;
        $old_banner_image = $package->banner_image;
        $input = $request->all();
        $image = fileUpload($request, 'image', 'package');
        $banner_image = fileUpload($request, 'banner_image', 'package');

        if ($image) {
            removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }

        if ($banner_image) {
            removeFile($old_banner_image);
            $input['banner_image'] = $banner_image;
        } else {
            unset($input['banner_image']);
        }

        $input['slug'] = $request->slug ? make_slug($request->slug) : make_slug($request->name);
        $package->update($input);
        $packageglobal = PackageGlobal::where('package_id', $package->id)->first();
        $pckg_global = $request->all();
        $pckg_global['package_id'] = $package->id;
        $packageglobal->update($pckg_global);

        //packages
        $package->category()->sync($request->category_ids);

        return redirect()->route('packages.edit', $package->id);
        // return redirect()->route('packages.index')->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        removeFile($package->image);
        removeFile($package->banner_image);
        $package->delete();

        //delete galleries according to package
        $galleries = $package->galleries()->get();
        foreach ($galleries as $g) {
            removeFile($g->image);
        }
        $package->galleries()->delete();

        //delete itenary
        $package->globalinfo()->delete();
        $package->itenaries()->delete();
        return redirect()->route('packages.index')->with('message', 'Delete Successfully');
    }

    public function galleryUpload($package_id)
    {
        $package = Package::findOrFail($package_id);
        $galleries = $package->galleries()->get();
        return view('admin.package.gallery', compact('package_id', 'galleries', 'package'));
    }

    public function galleryUploadStore(Request $request, $package)
    {
        $fileName = galleryfileUpload($request, 'file', 'package');
        GalleryPackage::create([
            'image' => $fileName,
            'package_id' => $package,
        ]);
    }


    public function packageGalleryDelete($image_id)
    {
        $gallery = GalleryPackage::findOrFail($image_id);
        removeFile($gallery->image);
        $gallery->delete();
    }
}
