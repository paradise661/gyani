@extends('layouts.admin.master')
@section('title', 'Visa Details')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Visa Details ({{ $visa->total() }})</h5>
            <small class="text-muted float-end">
                <a class="btn btn-primary" href="{{ route('packages.edit', $package_id) }}">
                    <i class="fa-solid fa-arrow-left"></i> Back
                </a>
                <a class="btn btn-primary" href="{{ route('packagevisa.create', $package_id) }}">
                    <i class="fa-solid fa-plus"></i> Create
                </a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            @if (!$visa->isEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Question</th>
                            <th>Order</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($visa as $key => $v)
                            <tr>
                                <!-- Pagination-friendly numbering -->
                                <td><strong>{{ $key + $visa->firstItem() }}</strong></td>

                                <td><strong>{{ $v->question ?? '' }}</strong></td>
                                <td>{{ $v->order ?? '' }}</td>
                                <td>{{ $v->updated_at->diffForHumans() }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ route('packagevisa.edit', [$package_id, $v->id]) }}"
                                        style="float: left; margin-right: 5px;">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <form class="delete-form"
                                        action="{{ route('packagevisa.destroy', [$package_id, $v->id]) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger delete_visa" data-type="confirm" type="submit"
                                            title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination links -->
                <div class="mt-3">
                    {{ $visa->links() }}
                </div>
            @else
                <div class="card-body">
                    <h6>No Data Found!</h6>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.delete_visa').click(function(e) {
            e.preventDefault();
            swal({
                title: "Are you sure?",
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $(this).closest("form").submit();
                }
            });
        });
    </script>
@endsection
