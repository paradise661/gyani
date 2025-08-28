@extends('layouts.admin.master')
@section('title', 'Image Galleries')

@section('content')
    <style>
        .fro-dropzone-image {
            position: relative;
        }

        .fro-dropzone-image-a {
            position: relative;
            width: 100%;
        }

        .fro-dropzone-image-img {
            height: 150px;
            width: 100%;
            object-fit: contain;
        }

        .fro-dropzone-image-btn {
            position: absolute;
            right: 1px;
        }
    </style>
    @include('admin.includes.message')

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Galleries ({{ $galleries->total() }})</h5>
            <small class="text-muted float-end">
                <a href="{{ route('galleries.create') }}" class="btn btn-primary"><i class="fa-solid fa-upload"></i>
                    Upload</a>
            </small>
        </div>

        <div class="container">
                <div class="row my-2">
                    @if (!$galleries->isEmpty())
                        @foreach ($galleries as $gallery)
                            <div class=" col-md-2 fro-dropzone-image mb-4">
                                <div class="container shadow h-100 py-2">
                                    <a href="{{ asset($gallery->image) }}"
                                        class="fro-dropzone-image-a fancybox" data-fancybox="demo" target="_blank">
                                        <img src="{{ asset($gallery->image) }}" alt=""
                                            class="fro-dropzone-image-img">
                                    </a>
                                    <button class="btn btn-danger btn-sm fro-dropzone-image-btn delete-single-document"
                                        imageid="{{ $gallery->id }}">X</button>
                                </div>
                            </div>
                        @endforeach
                        {{ $galleries->links() }}
                    @else
                        <div class="card-body">
                            <h6>No Data Found!</h6>
                        </div>
                    @endif

                </div>
            </div>
    </div>
@endsection


@section('scripts')
    <script>
        $('.delete-single-document').click(function(e) {
            e.preventDefault();
            var id = $(this).attr('imageid');

            var url = "{{ url('/admin/gallery/delete-file/') }}" + "/" + id;
            swal({
                    title: `Are you sure?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: url,
                            type: "GET",
                            success: function(data) {

                                setTimeout(function() {
                                    location.reload();
                                }, 1200);

                                toastr.success("Images Deleted Successfully!", {
                                    fadeAway: 1500
                                });

                            },
                            error: function(data) {
                                alert("Some Problems Occured!");
                            },
                        });
                    }
                });
        });
    </script>
@endsection
