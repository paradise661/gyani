<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreVisaRequest;
use App\Http\Requests\Admin\UpdateVisaRequest;
use App\Models\PackageVisa;
use Illuminate\Http\Request;

class PackageVisaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($package_id)
    {
        $visa = PackageVisa::where('package_id', $package_id)->oldest('order')->paginate(20);
        return view('admin.package.visa.index', compact('visa', 'package_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($package_id)
    {
        return view('admin.package.visa.create', compact('package_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $package_id)
    {
        $input = $request->all();
        $input['package_id'] = $package_id;
        $packagevisa = PackageVisa::create($input);
        return redirect()->route('packagevisa.edit', [$package_id, $packagevisa->id])->with('message', 'Created Successfully');
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
    public function edit($package_id, PackageVisa $packagevisa)
    {
        return view('admin.package.visa.edit', compact('packagevisa', 'package_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $package_id, PackageVisa $packagevisa)
    {
        $input = $request->all();
        $input['package_id'] = $package_id;
        $packagevisa->update($input);
        return redirect()->route('packagevisa.edit', [$package_id, $packagevisa->id])->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($package_id, PackageVisa $packagevisa)
    {
        $packagevisa->delete();
        return redirect()->route('packagevisa.index', $package_id)->with('message', 'Delete Successfully');
    }
}
