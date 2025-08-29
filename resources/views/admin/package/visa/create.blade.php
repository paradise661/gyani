@extends('layouts.admin.master')
@section('title', 'Visa Details')

@section('content')
    @include('admin.includes.message')

    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Create Visa Details</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('packagevisa.index', $package_id) }}"><i
                            class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('packagevisa.store', $package_id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Heading</label>
                                <input class="form-control @error('question') is-invalid @enderror" id=""
                                    type="text" name="question" value="{{ old('question') }}" placeholder="">
                                @error('question')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="basic-default-fullname">Order</label>
                            <input class="form-control @error('order') is-invalid @enderror" id="" type="number"
                                name="order" value="{{ old('order') }}" placeholder="">
                            @error('order')
                                <div class="invalid-feedback" style="display: block;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-message">Details</label>
                        <textarea class="form-control @error('answer') is-invalid @enderror ckeditor" id="" name="answer"
                            rows="8" placeholder="">{{ old('answer') }}</textarea>
                        @error('answer')
                            <div class="invalid-feedback" style="display: block;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="btn btn-primary" type="submit"><i class="fa-solid fa-plus"></i> Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script></script>
@endsection
