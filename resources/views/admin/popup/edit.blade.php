@extends('layouts.admin.master')
@section('title', 'Edit '.$popup->name)

@section('content')
    @include('admin.includes.message')
    
    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Goal - {{ $popup->name }}</h5>
                <small class="text-muted float-end">
                    <a href="{{ route('popup.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <form method="POST" class="row" action="{{ route('popup.update', $popup->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-md-9">
                        <div class="card card-body main-description shadow br-8 p-4">
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{ old('name', $popup->name) }}" class="form-control br-8 @error('name') is-invalid @enderror" placeholder="Enter Name">
                                @error('title')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" rows="10" class="form-control ckeditor br-8 @error('description') is-invalid @enderror"
                                    placeholder="Enter Description">{{ old('description', $popup->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body card shadow br-8">
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Status</label>
                                <select name="status" id="status" class="form-select ms-5">
                                    <option value="1" class="p-3"@if($popup->status == 1) selected @endif>Publish</option>
                                    <option value="0" class="p-3" @if($popup->status == 0) selected @endif>Draft</option>
                                </select>
                            </div>
                            
                            <hr class="shadow-sm">

                             <div class="form-group mb-3 d-flex align-items-center">
                                <label for="order">Order</label>
                                <input type="number" name="order" value="{{ old('order',$popup->order) }}" class="form-control ms-5 @error('order') is-invalid @enderror" placeholder="Enter Order">
                                @error('order')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>  
                            
                            <hr class="shadow-sm">

                            <div class="form-group mb-3 mt-2">
                                <label for="image">Featured Image</label>
                                <div class="custom-file">
                                    {{ asset($popup->image ?? '') }}
                                    <input type="file" name="image" class="dropify @error('image') is-invalid @enderror" id="image" data-default-file="">
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
