<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Sliders;
use App\Http\Requests\Admin\StoreSliderRequest;
use App\Http\Requests\Admin\UpdateSliderRequest;
use Session;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;
use PHPUnit\Framework\Error\Notice;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Sliders::latest()->paginate(20);
        return view('admin.sliders.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSliderRequest $request)
    {
        $input = $request->all();
        $input['image'] = fileUpload($request, 'image', 'slider');
        $sliders =  Sliders::create($input);
        return redirect()->route('slider.index')->with('message', 'Created Successfully');
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
    public function edit(Sliders $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSliderRequest $request, Sliders $slider)
    {
        $old_image = $slider->image;
        $input = $request->all();
        $image = fileUpload($request, 'image', 'slider');

        if ($image) {
            removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }
        $slider->update($input);
        return redirect()->route('slider.edit', $slider->id)->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sliders $slider)
    {
        removeFile($slider->image);
        $slider->delete();
        return redirect()->route('slider.index')->with('message', 'Delete Successfully');
    }
}
