<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreItineraryRequest;
use App\Http\Requests\Admin\UpdateItineraryRequest;
use App\Models\ItenaryPackage;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

class ItineraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($package_id)
    {
        $itinerarys = ItenaryPackage::where('package_id', $package_id)->oldest('order')->paginate(20);
        return view('admin.itinerarys.index', compact(['itinerarys', 'package_id']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($package_id)
    {
        return view('admin.itinerarys.create', compact('package_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItineraryRequest $request, $package_id)
    {
        $input = $request->all();
        $input['file'] = fileUpload($request, 'file', 'package');
        $input['package_id'] = $package_id;
        $itinerary =  ItenaryPackage::create($input); //itenary
        return redirect()->route('itinerarys.edit', [$package_id, $itinerary->id])->with('message', 'Created Successfully');
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
    public function edit($package_id, ItenaryPackage $itinerary)
    {
        $itinerayitems = $itinerary->itineraryitem;
        return view('admin.itinerarys.edit', compact('itinerary', 'package_id', 'itinerayitems'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItineraryRequest $request, $package_id, ItenaryPackage $itinerary)
    {
        $old_image = $itinerary->file;
        $input = $request->all();
        $image = fileUpload($request, 'file', 'package');
        $input['package_id'] = $package_id;

        if ($image) {
            removeFile($old_image);
            $input['file'] = $image;
        } else {
            unset($input['file']);
        }
        $itinerary->update($input);
        //iternary
        return redirect()->route('itinerarys.edit', [$package_id, $itinerary->id])->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($package_id, ItenaryPackage $itinerary)
    {
        removeFile($itinerary->file);
        $itinerary->delete();
        return redirect()->route('itinerarys.index', $package_id)->with('message', 'Delete Successfully');
    }
}
