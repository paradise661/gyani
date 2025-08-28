@extends('layouts.admin.master')
@section('title', 'Itinerarys')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Itinerarys ({{ $itinerarys->total() }})</h5>
            <small class="text-muted float-end">
                <a href="{{ route('packages.edit',$package_id) }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Back</a>
                <a href="{{ route('itinerarys.create',$package_id) }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Create</a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            @if (!$itinerarys->isEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Title</th>
                            <th>Order</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($itinerarys as $key => $service)
                            <tr>
                                <td><strong>{{ $key + $itinerarys->firstItem() }}</strong></td>
                                <td><strong>{{ $service->title ?? '' }}</strong></td>
                                <td>{{ $service->order ?? '' }}</td>

                                <td>{{ $service->updated_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('itinerarys.edit', [$package_id, $service->id]) }}" style="float: left;margin-right: 5px;" class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    <form class="delete-form" action="{{ route('itinerarys.destroy', [$package_id, $service->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger delete_service mr-2" id="" title="Delete" data-type="confirm"><i class="fa  fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $itinerarys->links() }}
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
        $('.delete_service').click(function(e) {
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
