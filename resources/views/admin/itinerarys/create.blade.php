@extends('layouts.admin.master')
@section('title', 'Itinerarys')

@section('content')
    @include('admin.includes.message')
    <style>
        /* HIDE RADIO */
        [type=radio] { 
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
        }

        /* IMAGE STYLES */
        [type=radio] + img {
        cursor: pointer;
        }

        /* CHECKED STYLES */
        [type=radio]:checked + img {
        outline: 2px solid #f00;
        }
    </style>
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Create Itinerary</h5>
                <small class="text-muted float-end">
                    <a href="{{ route('itinerarys.index',$package_id) }}" class="btn btn-primary"><i
                            class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('itinerarys.store',$package_id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-9 mb-4">
                            <div class="card card-body main-description shadow br-8 p-4">
                                <div class="form-group mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" value="{{ old('title') }}" class="form-control br-8 @error('title') is-invalid @enderror" placeholder="Enter Title">
                                    @error('title')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div> 
                                <div class="form-group mb-3">
                                    <label class="form-label" for="basic-default-message">Description</label>
                                    <textarea id="" class="form-control @error('description') is-invalid @enderror ckeditor" name="description"
                                        rows="8" placeholder="">{{ old('description') }}</textarea>
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
                                    <label for="order">Order</label>
                                    <input type="number" name="order" value="{{ old('order') }}" class="form-control ms-5 @error('order') is-invalid @enderror" placeholder="Enter Order">
                                    @error('order')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div> 
                                
                                <hr class="shadow-sm">

                                <div class="card-footers">
                                    <button type="submit" class="btn btn-lg btn-primary"><i class="fa-solid fa-plus"></i> Publish</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
