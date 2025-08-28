@extends('layouts.admin.master')
@section('title', 'Create New Slider')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Create slider</h5>
                <small class="text-muted float-end">
                    <a href="{{ route('slider.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0 mb-4">
                <form method="POST" class="row" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-9">
                        <div class="card card-body main-description shadow br-8 p-4">
                            <div class="row mb-3">
                                <div class="col-6 form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control br-8 @error('name') is-invalid @enderror" placeholder="Enter Name">
                                    @error('name')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-6 form-group">
                                    <label for="topname">Top Title</label>
                                    <input type="text" name="topname" value="{{ old('topname') }}" class="form-control br-8 @error('topname') is-invalid @enderror" placeholder="Enter Top Title">
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
                                    placeholder="Enter Description">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-6 form-group">
                                    <label for="link">Link</label>
                                    <input type="url" name="link" value="{{ old('link') }}" class="form-control br-8 @error('link') is-invalid @enderror" placeholder="Enter Link">
                                    @error('link')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-6 form-group">
                                    <label for="video">Video Url</label>
                                    <input type="text" name="video" value="{{ old('video') }}" class="form-control br-8 @error('video') is-invalid @enderror" placeholder="Enter Video Url">
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
                                <input type="number" name="order" value="{{ old('order') }}" class="form-control ms-5 @error('order') is-invalid @enderror" placeholder="Enter Order">
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
                                    <input type="file" name="image" data-show-remove="false" class="dropify @error('image') is-invalid @enderror" id="image">
                                    @error('image')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>    
                                 
                            <hr class="shadow-sm">

                            <div class="card-footers">
                                <button type="submit" class="btn btn-lg btn-primary"><i class="fa-solid fa-plus"></i> Publish</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function() {
            $(".image").change(function() {
                input = this;
                var nthis = $(this);
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        nthis.siblings('.view-image').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            });
        })
    </script>
@endsection
