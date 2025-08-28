@extends('layouts.admin.master')
@section('title', 'Create Packages')

@section('content')
    @include('admin.includes.message')

    <style>
        .nav-tabs .nav-link.active,
        .nav-tabs .nav-link.active:hover,
        .nav-tabs .nav-link.active:focus {
            background: #e7e7ff;
            background-color: #7174fe;
            color: white;
        }
    </style>

    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Create Package</h5>
                <small class="text-muted float-end">
                    <a href="{{ route('packages.index') }}" class="btn btn-primary"><i
                            class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body">
                <form method="POST" class="row" action="{{ route('packages.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-8">
                        <div class="card card-body main-description shadow br-8 p-4">
                            <div class="form-group mb-3">
                                <label class="form-label" for="basic-default-fullname">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" id="" value="{{ old('name') }}" placeholder="">
                                @error('name')
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

                            <div class="form-group mb-3">
                                <label class="form-label" for="basic-default-message">Short Description</label>
                                <textarea id="" class="form-control @error('short_description') is-invalid @enderror" name="short_description"
                                    rows="4" placeholder="">{{ old('short_description') }}</textarea>
                                @error('short_description')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card card-body my-5 shadow br-8 p-4">
                            <ul class="nav nav-tabs px-4" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="itinerary-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-global" type="button" role="tab"
                                        aria-controls="global" aria-selected="true">Global</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="visaprocess-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-visaprocess" type="button" role="tab"
                                        aria-controls="visaprocess" aria-selected="false">Inclusion/Exclusion</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="seo-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-seo" type="button" role="tab"
                                        aria-controls="seo" aria-selected="false">SEO</button>
                                </li>
                            </ul>

                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-global" role="tabpanel" aria-labelledby="nav-global-tab">
 
                                    <div class="form-group mb-3 mt-2">
                                        <label class="form-label" for="basic-default-message">Banner Image</label>
                                        <input type="file"
                                            class="form-control bannerimage @error('banner_image') is-invalid @enderror image"
                                            name="banner_image" id="">
                                        <img src="" height="100" alt="" class="view-image mt-2">
                                        @error('banner_image')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>  
                                    <div class="row mb-3">
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Price Prefix</label>
                                            <input type="text" name="priceprefix"
                                                class="form-control @error('priceprefix') is-invalid @enderror"
                                                value="{{ old('priceprefix') }}">
                                            @error('priceprefix')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Price</label>
                                            <input type="text" name="price"
                                                class="form-control @error('price') is-invalid @enderror"
                                                value="{{ old('price') }}">
                                            @error('price')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Per Price</label>
                                            <input type="text" name="priceper"
                                                class="form-control @error('priceper') is-invalid @enderror"
                                                value="{{ old('priceper') }}">
                                            @error('priceper')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Discount</label>
                                            <input type="number" name="discount"
                                                class="form-control @error('discount') is-invalid @enderror"
                                                value="{{ old('discount') }}">
                                            @error('discount')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Duration</label>
                                            <input type="text" name="duration"
                                                class="form-control @error('duration') is-invalid @enderror"
                                                value="{{ old('duration') }}">
                                            @error('duration')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Difficulty</label>
                                            <input type="text" name="type"
                                                class="form-control @error('type') is-invalid @enderror"
                                                value="{{ old('type') }}">
                                            @error('type')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Group Size</label>
                                            <input type="text" name="size"
                                                class="form-control @error('size') is-invalid @enderror"
                                                value="{{ old('size') }}">
                                            @error('size')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Transportation</label>
                                            <input type="text" name="transportation"
                                                class="form-control @error('transportation') is-invalid @enderror"
                                                value="{{ old('transportation') }}">
                                            @error('transportation')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">activity</label>
                                            <input type="text" name="activity"
                                                class="form-control @error('activity') is-invalid @enderror"
                                                value="{{ old('activity') }}">
                                            @error('activity')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Best Season</label>
                                            <input type="text" name="season"
                                                class="form-control @error('season') is-invalid @enderror"
                                                value="{{ old('season') }}">
                                            @error('season')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Accomodation</label>
                                            <input type="text" name="accomod"
                                                class="form-control @error('accomod') is-invalid @enderror"
                                                value="{{ old('accomod') }}">
                                            @error('accomod')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Meals</label>
                                            <input type="text" name="meal"
                                                class="form-control @error('meal') is-invalid @enderror"
                                                value="{{ old('meal') }}">
                                            @error('meal')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-visaprocess" role="tabpanel"
                                    aria-labelledby="nav-visaprocess-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="basic-default-fullname">Inclusion</label>
                                                <textarea name="inclusion" id="" cols="30" rows="10" class="form-control inclusioneditor">{{ old('inclusion') }}
                                                </textarea>
                                                @error('inclusion')
                                                    <div class="invalid-feedback" style="display: block;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="basic-default-fullname">Exclusion</label>
                                                <textarea name="exclusion" id="" cols="30" rows="10" class="form-control exclusioneditor">{{ old('exclusion') }}
                                                </textarea>
                                                @error('exclusion')
                                                    <div class="invalid-feedback" style="display: block;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-seo" role="tabpanel"
                                    aria-labelledby="nav-seo-tab">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Seo Title</label>
                                        <input type="text" class="form-control @error('seo_title') is-invalid @enderror"
                                            name="seo_title" id="" value="{{ old('seo_title') }}" placeholder="">
                                        @error('seo_title')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Meta Description</label>

                                        <textarea name="meta_description" id="" cols="30" rows="10"
                                            class="form-control @error('meta_description') is-invalid @enderror">{{ old('meta_description') }}</textarea>
                                        @error('meta_description')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Meta Keywords</label>
                                        <input type="text" class="form-control @error('meta_keywords') is-invalid @enderror"
                                            name="meta_keywords" id="" value="{{ old('meta_keywords') }}"
                                            placeholder="">
                                        @error('meta_keywords')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="seo_schema">Seo Schema</label>
                                        <textarea name="seo_schema" rows="10" class="form-control br-8"
                                        placeholder="Enter Seo Schema">{{ old('seo_schema') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-body card shadow br-8">
                            <div class="form-group mb-3">
                                <label class="form-label" for="basic-default-fullname">Status</label>
                                <select name="status" id=""
                                    class="form-select @error('status') is-invalid @enderror">
                                    <option value="1">Published</option>
                                    <option value="0">Draft</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <hr class="shadow-sm">

                            <div class="form-group mb-3 mt-2">
                                <div class="overflow-auto" style="max-height: 300px">
                                    <label class="form-label" for="basic-default-fullname">Category</label>
                                    @foreach ($packagecategories as $category)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="category_ids[]" value="{{ $category->id }}" id="category-{{ $category->id }}">
                                            <label class="form-check-label" for="category-{{ $category->id }}">
                                                {{ $category->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <hr class="shadow-sm">
                            <div class="form-group mb-3">
                                <label class="form-label" for="basic-default-fullname">Destination</label>
                                <input type="text" class="form-control @error('destination') is-invalid @enderror"
                                    name="destination" id="" value="{{ old('destination') }}" placeholder="">
                                @error('destination')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <hr class="shadow-sm">

                            <div class="form-group mb-3 mt-2">
                                <label class="form-label" for="basic-default-message">Thumbnail (IMAGE)</label>
                                <input type="file" class="form-control dropify @error('image') is-invalid @enderror image"
                                    name="image">
                                @error('image')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                                 
                            <hr class="shadow-sm">

                            <div class="card-footers">
                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Publish</button>
                            </div>
                        </div>
                        <div class="card-body card shadow my-3 br-8">
                            <div class="form-group mb-3 mt-2 d-flex justify-content-between">
                                <a class="btn btn-primary" href="javascript:void(0)"><i class="fa fa-list-ol"></i> Itinerary</a>
                                <a class="btn btn-primary" href="javascript:void(0)"><i class="fa fa-question"></i> Faq</a>
                                <a class="btn btn-primary" href="javascript:void(0)"><i class="fa fa-images"></i> Gallery</a>
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
        $('.dropify').dropify({
            messages: {
                'default': '',
                'replace': '',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });
        $('.bannerimage').dropify({
            messages: {
                'default': '',
                'replace': '',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });
    </script>
@endsection
