@extends('layouts.admin.master')
@section('title', 'Create New Posts')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Create Posts</h5>
                <small class="text-muted float-end">
                    <a href="{{ route('blog.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <form method="POST" class="row" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-9">
                        <div class="card card-body main-description shadow br-8 p-4">
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control br-8 @error('name') is-invalid @enderror" placeholder="Enter Name">
                                @error('name')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" rows="10" class="form-control ckeditor br-8 @error('description') is-invalid @enderror"
                                    placeholder="Enter Description">{{ old('description') }}</textarea>
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
                                    <input type="text" name="seo_title" value="{{ old('seo_title') }}" class="form-control br-8" placeholder="Enter Seo Title">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_description">Seo Description</label>
                                    <textarea name="seo_description" rows="4" class="form-control br-8"
                                    placeholder="Enter Seo Description">{{ old('seo_description') }}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_keywords">Seo Keywords</label>
                                    <input type="text" name="seo_keywords" value="{{ old('seo_keywords') }}" class="form-control br-8" placeholder="Enter Seo Keywords">
                                </div>
                                    <div class="form-group mb-3">
                                        <label for="seo_schema">Seo Schema</label>
                                        <textarea name="seo_schema" rows="10" class="form-control br-8"
                                        placeholder="Enter Seo Schema">{{ old('seo_schema') }}</textarea>
                                    </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body card shadow br-8">
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Status</label>
                                <select name="status" id="status" class="form-select ms-5">
                                    <option value="1" class="p-3">Publish</option>
                                    <option value="0" class="p-3">Draft</option>
                                </select>
                            </div>  
                                 
                            <hr class="shadow-sm">

                            <div class="card-footers">
                                <button type="submit" class="btn btn-lg btn-primary"><i class="fa-solid fa-plus"></i> Publish</button>
                            </div>
                            
                            <hr class="shadow-sm">

                            <div class="form-group mb-3 mt-2">
                                <label for="banner">Featured Banner</label>
                                <div class="custom-file">
                                    <input type="file" name="banner" data-show-remove="false" class="dropify @error('banner') is-invalid @enderror" id="banner">
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
                                    <input type="file" name="image" data-show-remove="false" class="dropify @error('image') is-invalid @enderror" id="image">
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
