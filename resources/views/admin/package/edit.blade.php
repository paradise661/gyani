@extends('layouts.admin.master')
@section('title', 'Edit Packages')

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
                <h5 class="mb-0">Edit Package "{{ $package->name }}"</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('packages.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body">
                <form class="row" method="POST" action="{{ route('packages.update', $package->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-md-8">
                        <div class="card card-body main-description shadow br-8 p-4">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="basic-default-fullname">Name</label>
                                        <input class="form-control @error('name') is-invalid @enderror" id=""
                                            type="text" name="name" value="{{ old('name', $package->name) }}"
                                            placeholder="">
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
                                        <input class="form-control @error('slug') is-invalid @enderror" id=""
                                            type="text" name="slug" value="{{ old('slug', $package->slug) }}"
                                            placeholder="">
                                        @error('slug')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="basic-default-message">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror ckeditor" id="" name="description"
                                    rows="8" placeholder="">{{ old('description', $package->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="basic-default-message">Short Description</label>
                                <textarea class="form-control @error('short_description') is-invalid @enderror" id="" name="short_description"
                                    rows="4" placeholder="">{{ old('short_description', $package->short_description) }}</textarea>
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
                                        data-bs-target="#nav-global" type="button" role="tab" aria-controls="global"
                                        aria-selected="true">Global</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="visaprocess-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-visaprocess" type="button" role="tab"
                                        aria-controls="visaprocess" aria-selected="false">Inclusion/Exclusion</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="termscondition-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-termscondition" type="button" role="tab"
                                        aria-controls="termscondition" aria-selected="false">SEO</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-global" role="tabpanel"
                                    aria-labelledby="nav-global-tab">
                                    <div class="row mb-3">

                                        <div class="form-group mb-3 mt-2">
                                            <label class="form-label" for="banner_image">Bannner Image</label>

                                            <input class="bannerimage" id="banner_image" data-show-remove="false"
                                                data-default-file="{{ $package->banner_image ?? '' }}" type="file"
                                                name="banner_image">
                                            @error('banner_image')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Price Prefix</label>
                                            <input class="form-control @error('priceprefix') is-invalid @enderror"
                                                type="text" name="priceprefix"
                                                value="{{ old('priceprefix', $globalinfo->priceprefix) }}">
                                            @error('priceprefix')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Price</label>
                                            <input class="form-control @error('price') is-invalid @enderror"
                                                type="text" name="price"
                                                value="{{ old('price', $package->price) }}">
                                            @error('price')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Per Price</label>
                                            <input class="form-control @error('priceper') is-invalid @enderror"
                                                type="text" name="priceper"
                                                value="{{ old('priceper', $globalinfo->priceper) }}">
                                            @error('priceper')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Discount</label>
                                            <input class="form-control @error('discount') is-invalid @enderror"
                                                type="number" name="discount"
                                                value="{{ old('discount', $globalinfo->discount ?? '') }}">
                                            @error('discount')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Duration</label>
                                            <input class="form-control @error('duration') is-invalid @enderror"
                                                type="text" name="duration"
                                                value="{{ old('duration', $globalinfo->duration ?? '') }}">
                                            @error('duration')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Difficulty</label>
                                            <input class="form-control @error('type') is-invalid @enderror" type="text"
                                                name="type" value="{{ old('type', $globalinfo->type ?? '') }}">
                                            @error('type')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Group Size</label>
                                            <input class="form-control @error('size') is-invalid @enderror"
                                                type="text" name="size"
                                                value="{{ old('size', $globalinfo->size ?? '') }}">
                                            @error('size')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Transportation</label>
                                            <input class="form-control @error('transportation') is-invalid @enderror"
                                                type="text" name="transportation"
                                                value="{{ old('transportation', $globalinfo->transportation ?? '') }}">
                                            @error('transportation')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Activity</label>
                                            <input class="form-control @error('activity') is-invalid @enderror"
                                                type="text" name="activity"
                                                value="{{ old('activity', $globalinfo->activity ?? '') }}">
                                            @error('activity')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Best Season</label>
                                            <input class="form-control @error('season') is-invalid @enderror"
                                                type="text" name="season"
                                                value="{{ old('season', $globalinfo->season ?? '') }}">
                                            @error('season')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Accomodation</label>
                                            <input class="form-control @error('accomod') is-invalid @enderror"
                                                type="text" name="accomod"
                                                value="{{ old('accomod', $globalinfo->accomod ?? '') }}">
                                            @error('accomod')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Meals</label>
                                            <input class="form-control @error('meal') is-invalid @enderror"
                                                type="text" name="meal"
                                                value="{{ old('meal', $globalinfo->meal ?? '') }}">
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
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="basic-default-fullname">Inclusion</label>
                                        <textarea class="form-control inclusioneditor" id="" name="inclusion" cols="30" rows="10"> {{ old('inclusion', $package->inclusion) }}</textarea>
                                        @error('inclusion')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="basic-default-fullname">Exclusion</label>
                                        <textarea class="form-control exclusioneditor" id="" name="exclusion" cols="30" rows="10"> {{ old('exclusion', $package->exclusion) }}</textarea>
                                        @error('exclusion')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-termscondition" role="tabpanel"
                                    aria-labelledby="nav-termscondition-tab">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Seo Title</label>
                                        <input class="form-control @error('seo_title') is-invalid @enderror"
                                            id="" type="text" name="seo_title"
                                            value="{{ old('seo_title', $package->seo_title) }}" placeholder="">
                                        @error('seo_title')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Meta Description</label>
                                        <textarea class="form-control @error('meta_description') is-invalid @enderror" id=""
                                            name="meta_description" cols="30" rows="10">{{ old('meta_description', $package->meta_description) }}</textarea>
                                        @error('meta_description')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Meta Keywords</label>
                                        <input class="form-control @error('meta_keywords') is-invalid @enderror"
                                            id="" type="text" name="meta_keywords"
                                            value="{{ old('meta_keywords', $package->meta_keywords) }}" placeholder="">
                                        @error('meta_keywords')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="seo_schema">Seo Schema</label>
                                        <textarea class="form-control br-8" name="seo_schema" rows="10" placeholder="Enter Seo Schema">{{ old('seo_schema', $package->seo_schema) }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-body card shadow br-8">
                            <div class="form-group mb-3">
                                <label class="form-label" for="basic-default-fullname">Status</label>
                                <select class="form-select @error('status') is-invalid @enderror" id=""
                                    name="status">
                                    <option {{ $package->status == 1 ? 'selected' : '' }} value="1">Published
                                    </option>
                                    <option {{ $package->status == 0 ? 'selected' : '' }} value="0">Draft</option>
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
                                            <input class="form-check-input" id="category-{{ $category->id }}"
                                                type="checkbox" name="category_ids[]" value="{{ $category->id }}"
                                                @if (in_array($category->id, $checkcategory)) {{ 'checked' }} @endif>
                                            <label class="form-check-label" for="category-{{ $category->id }}">
                                                {{ $category->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <hr class="shadow-sm">

                            <div class="form-group mb-3">
                                <label class="form-label" for="basic-default-fullname">destination</label>
                                <input class="form-control @error('destination') is-invalid @enderror" id=""
                                    type="text" name="destination"
                                    value="{{ old('destination', $package->destination) }}" placeholder="">
                                @error('destination')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <hr class="shadow-sm">
                            <div class="form-group mb-3 mt-2">
                                <label class="form-label" for="basic-default-message">Thumbnail (IMAGE)</label>
                                <input class="form-control dropify @error('image') is-invalid @enderror" id="image"
                                    data-show-remove="false" data-default-file="{{ $package->image ?? null }}"
                                    type="file" name="image">
                                @error('image')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <hr class="shadow-sm">
                            <div class="card-footers d-flex justify-content-between">
                                <a class="btn btn-lg btn-success" href="{{ route('packagesingle', $package->slug) }}"
                                    target="_blank"><i class="fa-solid fa-eye"></i> View</a>
                                <button class="btn btn-primary" type="submit"><i class="fa fa-rotate"
                                        aria-hidden="true"></i> Update</button>
                            </div>
                        </div>
                        <div class="card-body card shadow my-3 br-8">
                            <div class="form-group mb-3 mt-2 d-flex justify-content-between">
                                <a class="btn btn-primary" href="{{ route('itinerarys.index', $package->id) }}"><i
                                        class="fa fa-list-ol"></i> Itinerary</a>
                                <a class="btn btn-primary" href="{{ route('packagefaqs.index', $package->id) }}"><i
                                        class="fa fa-question"></i> Faq</a>
                                <a class="btn btn-primary" href="{{ route('packagevisa.index', $package->id) }}"><i
                                        class="fa fa-plane"></i> Visa</a>

                                {{-- <a class="btn btn-primary" href="{{ route('upload.gallery', $package->id) }}"><i class="fa fa-images"></i> Gallery</a> --}}
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
