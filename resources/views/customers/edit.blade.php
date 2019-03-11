@extends('layouts.app')

@section('pageTitle', 'Edit Customer')

@section('content')

    <h2 class="heading-secondary"> Edit Customer </h2>

    <div class="row">
        <div class="col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div class="error-alert">- {{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="post" action="/customers/{{ $customer->id }}">
                @method('PATCH')
                @csrf

                <div class="form-row mb-3">
                    <div class="form-group col-md-6">
                        <label for="fullname">Full Name: </label>
                        <input id="fullname" class="form-control" type="text" placeholder="Full Name"
                               value="{{ $customer->fullname }}" name="fullname" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email: </label>
                        <input id="email" class="form-control" type="email" placeholder="Email" name="email" value="{{ $customer->email }}">
                    </div>
                </div>

                <div class="form-row mb-3">
                    <div class="col-md-12">
                        <div class="form-check-inline">
                            <label class="form-check-label" for="radio1">
                                <input type="radio" class="form-check-input" id="radio1" name="gender" value="M" required
                                {{ $customer->gender == 'M' ? 'checked' : '' }}>Male
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label" for="radio2">
                                <input type="radio" class="form-check-input" id="radio2" name="gender" value="F" required
                                {{ $customer->gender == 'F' ? 'checked' : '' }}> Female
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-row mb-3">
                    <div class="form-group col-md-6">
                        <label for="address">Address: </label>
                        <input id="address" class="form-control" type="text" placeholder="Address" name="address" value="{{ $customer->address }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="date_of_birth">Date of Birth: </label>
                        <input id="date_of_birth" class="form-control" type="date" placeholder="Birth Date" name="date_of_birth" value="{{ $customer->date_of_birth }}">
                    </div>
                </div>

                <div class="form-row mb-3">
                    <div class="col-md-12">
                        <label>Phones:</label>
                    </div>
                </div>

                @if ($customer->phones->count())
                    <div class="form-row mb-3">
                        @foreach($customer->phones as $phone)
                            <div class="form-group col-md-5">
                                <input class="form-control" type="number" placeholder="Phone Number" name="phones[]" value="{{ $phone->phone_number }}">
                            </div>
                            <div class="form-group col-md-1">
                                <button type="button" class="btn btn-default remove-phone" title="Remove Phone" onclick="removePhoneElement(this)">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="form-row mb-3">
                    <div class="form-group col-md-6">
                        <input id="phone" class="form-control" type="number" placeholder="Add Phone Number" name="phone">
                    </div>
                    <div class="form-group col-md-6">
                        <button type="button" class="btn btn-secondary" onclick="addPhone()">Add</button>
                    </div>
                </div>
                <div class="form-row mb-3 customer-phones">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-primary ml-3" onclick="window.location.href='/customers' ">
                    Cancel
                </button>

            </form>
        </div>
    </div>

@endsection