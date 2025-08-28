@extends('layouts.admin.master')
@section('title', 'Edit '.$page->name)

@section('content')
    @include('admin.includes.message')
    
    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit News - {{ $page->name }}</h5>
                <small class="text-muted float-end">
                    <a href="{{ route('page.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <form method="POST" class="row" action="{{ route('page.update', $page->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-md-9">
                        <div class="card card-body main-description shadow br-8 p-4">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="basic-default-fullname">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="" value="{{ old('name', $page->name) }}" placeholder="">
                                        @error('name')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="basic-default-slug">slug</label>
                                        <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                            name="slug" id="" value="{{ old('slug', $page->slug) }}" placeholder="">
                                        @error('slug')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>                                    
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" rows="10" class="form-control ckeditor br-8 @error('description') is-invalid @enderror"
                                    placeholder="Enter Description">{{ old('description', $page->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card card-body seo my-5 shadow br-8 p-4">
                            <fieldset class="border p-3">
                                <legend class="float-none w-auto legend-title">SEO</legend>
                                <div class="form-group mb-3">
                                    <label for="seo_title">Seo Title</label>
                                    <input type="text" name="seo_title" value="{{ old('seo_title',$page->seo_title) }}" class="form-control br-8" placeholder="Enter Seo Title">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_description">Seo Description</label>
                                    <textarea name="seo_description" rows="4" class="form-control br-8"
                                    placeholder="Enter Seo Description">{{ old('seo_description',$page->seo_description) }}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_keywords">Seo Keywords</label>
                                    <input type="text" name="seo_keywords" value="{{ old('seo_keywords',$page->seo_keywords) }}" class="form-control br-8" placeholder="Enter Seo Keywords">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_schema">Seo Schema</label>
                                    <textarea name="seo_schema" rows="4" class="form-control br-8"
                                    placeholder="Enter Seo Schema">{{ old('seo_schema',$page->seo_schema) }}</textarea>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body card shadow br-8">
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Status</label>
                                <select name="status" id="status" class="form-select ms-5">
                                    <option value="1" class="p-3"@if($page->status == 1) selected @endif>Publish</option>
                                    <option value="0" class="p-3" @if($page->status == 0) selected @endif>Draft</option>
                                </select>
                            </div>
                            
                            <hr class="shadow-sm">

                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Template</label>
                                <select name="template" id="template" class="form-select ms-5">
                                    <option value="0" class="p-3" @if($page->template == 0) selected @endif>Default Template</option>
                                    <option value="1" class="p-3"@if($page->template == 1) selected @endif>Side-To-Side</option>
                                    <option value="2" class="p-3"@if($page->template == 2) selected @endif>About Us</option>
                                    <option value="9" class="p-3"@if($page->template == 9) selected @endif>Contact Us</option>
                                    <option value="14" class="p-3"@if($page->template == 14) selected @endif>All Packages</option>
                                    <option value="15" class="p-3"@if($page->template == 15) selected @endif>Packages Category</option>
                                    <option value="3" class="p-3"@if($page->template == 3) selected @endif>Teams</option>
                                    <option value="4" class="p-3"@if($page->template == 4) selected @endif>Reviews</option>
                                    <option value="5" class="p-3"@if($page->template == 5) selected @endif>Faqs</option>
                                    <option value="6" class="p-3"@if($page->template == 6) selected @endif>Partners</option>
                                    <option value="8" class="p-3"@if($page->template == 8) selected @endif>Gallery</option>
                                    <option value="10" class="p-3"@if($page->template == 10) selected @endif>Blogs</option>
                                    <option value="11" class="p-3"@if($page->template == 11) selected @endif>Services</option>
                                    <option value="13" class="p-3"@if($page->template == 13) selected @endif>Booking</option>
                                    <option value="16" class="p-3"@if($page->template == 16) selected @endif>Sitemap</option>
                                </select>
                            </div>      
                                 
                            <hr class="shadow-sm">

                            <div class="card-footers d-flex justify-content-between">
                                <a href="{{ route('pagesingle',$page->slug) }}" target="_blank" class="btn btn-lg btn-success"><i class="fa-solid fa-eye"></i> View</a>
                                <button type="submit" class="btn btn-lg btn-primary"><i class="fa-solid fa-rotate"></i> Update</button>
                            </div>
                            
                            <hr class="shadow-sm">

                            <div class="form-group mb-3 mt-2">
                                <label for="banner">Featured Banner</label>
                                <div class="custom-file">
                                    <input type="file" name="banner" data-show-remove="false" class="dropify @error('banner') is-invalid @enderror" id="banner" data-default-file="{{ $page->banner }}">
                                    @error('banner')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>  
                            
                            <hr class="shadow-sm">

                            <div class="form-group mb-3 mt-2">
                                <label for="image">Featured Image</label>
                                <div class="custom-file">
                                    <input type="file" name="image" data-show-remove="false" class="dropify @error('image') is-invalid @enderror" id="image" data-default-file="{{ $page->image }}">
                                    @error('image')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection