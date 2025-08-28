@extends('layouts.admin.master')
@section('title', 'FAQs')

@section('content')
    @include('admin.includes.message')

    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit FAQs "{{ $packagefaqs->title }}"</h5>
                <small class="text-muted float-end">
                    <a href="{{ route('packagefaqs.index', $package_id) }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('packagefaqs.update', [$package_id,$packagefaqs->id]) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label class="form-label" for="basic-default-fullname">question</label>
                            <input type="text" class="form-control @error('question') is-invalid @enderror"
                                value="{{ old('question', $packagefaqs->question) }}" name="question" id="" placeholder="">
                            @error('question')
                                <div class="invalid-feedback" style="display: block;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="basic-default-fullname">Order</label>
                            <input type="number" class="form-control @error('order') is-invalid @enderror"
                                value="{{ old('order', $packagefaqs->order) }}" name="order" id="" placeholder="">
                            @error('order')
                                <div class="invalid-feedback" style="display: block;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-message">answer</label>
                        <textarea id="" class="form-control @error('answer') is-invalid @enderror ckeditor" name="answer"
                            rows="8" placeholder="">{{ old('answer', $packagefaqs->answer) }}</textarea>
                        @error('answer')
                            <div class="invalid-feedback" style="display: block;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-rotate"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script></script>
@endsection
