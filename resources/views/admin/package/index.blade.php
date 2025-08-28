@extends('layouts.admin.master')
@section('title', 'Packages')

@section('content')
    @include('admin.includes.message')


    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Packages ({{ $packages->total() }})</h5>
            <small class="text-muted float-end">
                <a href="{{ route('packages.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i>
                    Create</a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            @if (!$packages->isEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($packages as $key => $package)
                            <tr>
                                <td><strong>{{ $key + $packages->firstItem() }}</strong></td>
                                <td><strong>{{ $package->name ?? '' }}</strong></td>
                                <td><span
                                        class="badge {{ $package->status == 0 ? 'bg-label-danger' : 'bg-label-success' }}">{{ $package->status == 0 ? 'Draft' : 'Published' }}</span>
                                </td>

                                <td>
                                    <a href="{{ route('packagesingle', $package->slug) }}" target="_blank"
                                        style="float: left;margin-right: 5px;" class="btn btn-sm btn-warning"><i
                                            class="fa fa-eye"></i></a>

                                    <a href="{{ route('packages.edit', $package->id) }}"
                                        style="float: left;margin-right: 5px;" class="btn btn-sm btn-primary"><i
                                            class="fa-solid fa-pen-to-square"></i></a>


                                    <form class="delete-form" action="{{ route('packages.destroy', $package->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger delete_package mr-2"
                                            id="" title="Delete" data-type="confirm"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $packages->links() }}
            @else
                <div class="card-body">
                    <h6>No Package Data Found!</h6>
                </div>
            @endif
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $('.delete_package').click(function(e) {
            e.preventDefault();
            swal({
                    title: `Are you sure?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $(this).closest("form").submit();
                    }
                });

        });
    </script>
@endsection
