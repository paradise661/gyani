@extends('layouts.admin.master')
@section('title', 'Edit '.$slider->name)

@section('content')
    @include('admin.includes.message')
    
    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Slider - {{ $slider->name }}</h5>
                <small class="text-muted float-end">
                    <a href="{{ route('slider.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <form method="POST" class="row" action="{{ route('slider.update', $slider->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-md-9">
                        <div class="card card-body main-description shadow br-8 p-4">
                            <div class="row mb-4">
                                <div class="col-6 form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{ old('name', $slider->name) }}" class="form-control br-8 @error('name') is-invalid @enderror" placeholder="Enter Name">
                                    @error('name')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-6 form-group">
                                    <label for="topname">Top Name</label>
                                    <input type="text" name="topname" value="{{ old('topname', $slider->topname) }}" class="form-control br-8 @error('topname') is-invalid @enderror" placeholder="Enter Top Name">
                                    @error('topname')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" rows="10" class="form-control ckeditor br-8 @error('description') is-invalid @enderror"
                                    placeholder="Enter Description">{{ old('description', $slider->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row mb-4">
                                <div class="col-6 form-group">
                                    <label for="link">Link</label>
                                    <input type="text" name="link" value="{{ old('link', $slider->link) }}" class="form-control br-8 @error('link') is-invalid @enderror" placeholder="Enter Link">
                                    @error('link')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-6 form-group">
                                    <label for="video">Video</label>
                                    <input type="text" name="video" value="{{ old('video', $slider->video) }}" class="form-control br-8 @error('video') is-invalid @enderror" placeholder="Enter Top Name">
                                    @error('video')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body card shadow br-8">
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label for="order">Order</label>
                                <input type="number" name="order" value="{{ old('order', $slider->order) }}" class="form-control ms-5 @error('order') is-invalid @enderror" placeholder="Enter Order">
                                @error('order')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> 
                            
                            <hr class="shadow-sm">

                            <div class="form-group mb-3 mt-2">
                                <label for="image">Slider Image</label>
                                <div class="custom-file">
                                    <input type="file" name="image" data-show-remove="false" class="dropify @error('image') is-invalid @enderror" id="image" data-default-file="{{ $slider->image }}">
                                    @error('image')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>    
                                 
                            <hr class="shadow-sm">

                            <div class="card-footers">
                                <button type="submit" class="btn btn-lg btn-primary"><i class="fa-solid fa-rotate"></i> Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection