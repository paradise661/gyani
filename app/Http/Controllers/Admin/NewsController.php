<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Http\Requests\Admin\StoreNewsRequest;
use App\Http\Requests\Admin\UpdateNewsRequest;
use Session;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = News::latest()->paginate(20);
        return view('admin.news.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        $input = $request->all();
        $input['image'] = fileUpload($request, 'image', 'blog');
        $input['banner'] = fileUpload($request, 'banner', 'blog');
        $input['seo_title'] = $request->seo_title ?? $request->name;
        $slug = make_slug($request->name);
        $blog =  News::create($input);
        $blog->update(['slug' => $slug]);
        return redirect()->route('blog.index')->with('message', 'Created Successfully');
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
    public function edit(News $blog)
    {
        return view('admin.news.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, News $blog)
    {
        $old_image = $blog->image;
        $old_banner = $blog->banner;
        $input = $request->all();
        $image = fileUpload($request, 'image', 'blog');
        $banner = fileUpload($request, 'banner', 'blog');

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
        $blog->update($input);
        return redirect()->route('blog.edit', $blog->id)->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $blog)
    {
        removeFile($blog->image);
        $blog->delete();
        return redirect()->route('blog.index')->with('message', 'Delete Successfully');
    }
}
