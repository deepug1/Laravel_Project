@extends('frontend.pages.main')
@section('main')
    <center><h1>Welcome to Lab Test Hub</h1></center>

    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-1">
                    <div class="form-conatainer-register">
                        <div class="form-btn-register">
                            <span>Book a Lab Test</span>
                        </div>

                        <!-- resources/views/prescription/form.blade.php -->
                        <form action="/book-test" method="post" enctype="multipart/form-data">
                            @csrf

                            <!-- Retrieve user details from session or database -->
                            @if(session('loginid'))
                                @php
                                    $user = App\Models\User::find(session('loginid'));
                                @endphp
                            @else
                                @php
                                    // Fetch user details from the database using the authenticated user (if applicable)
                                    $user = auth()->user();
                                @endphp
                            @endif

                            <label for="username">Username:</label>
                            <input type="text" name="username" value="{{ $user->username }}" readonly>

                            <label for="test_id">Select Test:</label>
                            <select name="test_id" required>
                                @foreach($tests as $testId => $testName)
                                    <option value="{{ $testId }}">{{ $testName }}</option>
                                @endforeach
                            </select>

                            <label for="appointment_date">Appointment Date:</label>
                            <input type="date" name="appointment_date" required>

                            <label for="appointment_time">Appointment Time:</label>
                            <input type="time" name="appointment_time" required>

                            <label for="prescription_image">Prescription Image:</label>
                            <input type="file" name="prescription_image" accept="image/*" required>

                            <button type="submit">Book Test</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <!-- Display order details and preview of the uploaded prescription on successful booking -->
@if(session('booking_success'))
<div>
    <h2>Booking Successful!</h2>
    <p>Order Details:</p>
    <ul>
        <li>Test: {{ $bookingSuccessDetails['test_name'] }}</li>
        <li>Appointment Date: {{ $bookingSuccessDetails['appointment_date'] }}</li>
        <li>Appointment Time: {{ $bookingSuccessDetails['appointment_time'] }}</li>
        <!-- Add other relevant order details here -->
    </ul>

    <!-- Display the uploaded prescription image here -->
    <img src="{{ asset('storage/' . $selectedTest->prescription_image) }}" alt="Prescription Image">
</div>
@endif


@endsection

