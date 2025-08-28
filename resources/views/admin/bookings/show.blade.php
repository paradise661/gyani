@extends('layouts.admin.master')
@section('title', 'Booking')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Booking</h5>
                <small class="text-muted float-end">
                    <a href="{{ route('booking.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0 mb-3">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Field</th>
                            <th scope="col">Answer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>{{ $booking->name }}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{ $booking->phone }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $booking->email }}</td>
                        </tr>
                        <tr>
                            <td>Country Code</td>
                            <td>{{ $booking->country }}</td>
                        </tr>
                        <tr>
                            <td>Adults</td>
                            <td>{{ $booking->adults }}</td>
                        </tr>
                        <tr>
                            <td>Childs</td>
                            <td>{{ $booking->childs }}</td>
                        </tr>
                        <tr>
                            <td>Departure City</td>
                            <td>{{ $booking->departure_city }}</td>
                        </tr>
                        <tr>
                            <td>Duration</td>
                            <td>{{ $booking->duration }}</td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td>{{ $booking->traveldate }}</td>
                        </tr>
                        <tr>
                            <td>Message</td>
                            <td>{!! $booking->message !!}</td>
                        </tr>
                        <tr>
                            <td>Link</td>
                            <td><a href="{{ $booking->pageurl }}" target="_blank" class="btn btn-sm btn-success">View Page</a></td>
                        </tr>
                        <tr>
                            <td>Time</td>
                            <td>{{ $booking->created_at->diffForHumans() }}</td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
