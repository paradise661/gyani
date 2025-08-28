@extends('layouts.admin.master')
@section('title', 'All Booking')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Booking ({{ $bookings->total() }})</h5>
        </div>

        <div class="table-responsive text-nowrap">
            @if (!$bookings->isEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Date</th>
                            <th>Submitted at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($bookings as $key => $blog)
                            <tr>
                                <td><strong>{{ $key + $bookings->firstItem() }}</strong></td>
                                <td><strong>{{ $blog->name }}</strong></td>
                                <td><strong>{{ $blog->email }}</strong></td>
                                <td><strong>{{ $blog->phone }}</strong></td>
                                <td><strong>{{ $blog->traveldate }}</strong></td>
                                <td>{{ $blog->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('booking.show', $blog->id) }}"
                                        style="float: left;margin-right: 5px;" class="btn btn-sm btn-success"><i
                                            class="fa-solid fa-eye"></i> View</a>


                                    <form class="delete-form" action="{{ route('booking.destroy', $blog->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger delete_bookings mr-2" id=""
                                            title="Delete" data-type="confirm"><i class="fa fa-trash"></i>
                                            Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $bookings->links() }}
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
        $('.delete_bookings').click(function(e) {
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
