<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFaqRequest;
use App\Http\Requests\Admin\UpdateFaqRequest;
use App\Models\PackageFaq;
use Illuminate\Http\Request;

class PackageFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($package_id)
    {
        $faqs = PackageFaq::where('package_id', $package_id)->oldest('order')->paginate(20);
        return view('admin.package.faq.index', compact('faqs', 'package_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($package_id)
    {
        return view('admin.package.faq.create', compact('package_id'));
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
        $packagefaqs = PackageFaq::create($input);
        return redirect()->route('packagefaqs.edit', [$package_id, $packagefaqs->id])->with('message', 'Created Successfully');
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
    public function edit($package_id, PackageFaq $packagefaqs)
    {
        return view('admin.package.faq.edit', compact('packagefaqs', 'package_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $package_id, PackageFaq $packagefaqs)
    {
        $input = $request->all();
        $input['package_id'] = $package_id;
        $packagefaqs->update($input);
        return redirect()->route('packagefaqs.edit', [$package_id, $packagefaqs->id])->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($package_id, PackageFaq $packagefaqs)
    {
        $packagefaqs->delete();
        return redirect()->route('packagefaqs.index', $package_id)->with('message', 'Delete Successfully');
    }
}
