@extends('template.backendtemplate')

@section('content')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet" style="margin-bottom: 0 !important;">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Checkins Form
                </h3>
                </div>
            </div>

            <!--begin::Form-->
            <form class="kt-form" method="post" action="{{route('checkins.store')}}">
                @csrf
                <div class="kt-portlet__body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-4">Room Informations:</h4>
                            <div class="form-group row">
                                <label for="transactionInput" class="col-3 col-form-label">Transaction No:</label>
                                <div class="col-9">
                                    <input type="text" id="transactionInput" class="form-control @error('transaction_no') is-invalid @enderror" name="transaction_no" value="{{$transaction_id}}" required autocomplete="transaction_no" autofocus readonly>
                                    @error('transaction_no')
                                        <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                        </span>
                                    @enderror
                                    <!-- <span class="form-text text-muted">Please enter room type name</span> -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="roomTypeInput" class="col-3 col-form-label">Room Types:</label>
                                <div class="col-9">
                                    <select name="room_type" class="form-control">
                                        <optgroup label="Room Types">
                                            @foreach($roomtypes as $type)
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                    {{-- <input type="text" id="roomTypeInput" class="form-control @error('room_type') is-invalid @enderror" name="room_type" value="" required autocomplete="room_type" autofocus>
                                    @error('room_type')
                                        <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                        </span>
                                    @enderror --}}
                                    <!-- <span class="form-text text-muted">Please enter room type name</span> -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="roomInput" class="col-3 col-form-label">Room No:</label>
                                <div class="col-9">
                                    <input type="text" id="roomInput" class="form-control @error('room_no') is-invalid @enderror" name="room_no" value="" required autocomplete="room_no" autofocus>
                                    @error('room_no')
                                        <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                        </span>
                                    @enderror
                                    <!-- <span class="form-text text-muted">Please enter room type name</span> -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="checkInInput" class="col-3 col-form-label">CheckIn Date:</label>
                                <div class="col-9">
                                    <input type="date" id="checkInInput" class="form-control @error('checkin') is-invalid @enderror" name="checkin" value="" required autocomplete="checkin" autofocus>
                                    @error('checkin')
                                        <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                        </span>
                                    @enderror
                                    <!-- <span class="form-text text-muted">Please enter room type name</span> -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="checkOutInput" class="col-3 col-form-label">CheckOut Date:</label>
                                <div class="col-9">
                                    <input type="date" id="checkOutInput" class="form-control @error('checkout') is-invalid @enderror" name="checkout" value="" required autocomplete="checkout" autofocus>
                                    @error('checkout')
                                        <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                        </span>
                                    @enderror
                                    <!-- <span class="form-text text-muted">Please enter room type name</span> -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="adultInput" class="col-3 col-form-label">Adults:</label>
                                <div class="col-9">
                                    <input type="number" id="adultInput" class="form-control @error('adult') is-invalid @enderror" name="adult" value="" required autocomplete="adult" autofocus>
                                    @error('adult')
                                        <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                        </span>
                                    @enderror
                                    <!-- <span class="form-text text-muted">Please enter room type name</span> -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="childrenInput" class="col-3 col-form-label">Children:</label>
                                <div class="col-9">
                                    <input type="number" id="childrenInput" class="form-control @error('children') is-invalid @enderror" name="children" value="" required autocomplete="children" autofocus>
                                    @error('children')
                                        <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                        </span>
                                    @enderror
                                    <!-- <span class="form-text text-muted">Please enter room type name</span> -->
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <label for="example-text-input" class="col-3 col-form-label">Email address:</label>
                                <div class="col-9">
                                <input type="email" class="form-control" placeholder="Enter email">
                                <span class="form-text text-muted">We'll never share your email with anyone else</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-3 col-form-label">Communication:</label>
                                <div class="col-9">
                                <div class="kt-checkbox-inline">
                                    <label class="kt-checkbox">
                                    <input type="checkbox"> Email
                                    <span></span>
                                    </label>
                                    <label class="kt-checkbox">
                                    <input type="checkbox"> SMS
                                    <span></span>
                                    </label>
                                    <label class="kt-checkbox">
                                    <input type="checkbox"> Phone
                                    <span></span>
                                    </label>
                                </div>
                                </div>
                            </div> -->
                        </div>

                        <div class="col-md-6">
                            <h4 class="mb-4">Customer Informations:</h4>

                            <div class="form-group row">
                                <label for="nameInput" class="col-3 col-form-label">Name:</label>
                                <div class="col-9">
                                <input type="text" id="nameInput" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Customer Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                    </span>
                                @enderror
                                <!-- <span class="form-text text-muted">Please enter room type name</span> -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="contactInput" class="col-3 col-form-label">Contact:</label>
                                <div class="col-9">
                                <input type="text" id="contactInput" class="form-control @error('contact') is-invalid @enderror" placeholder="Enter Phone No" name="contact" value="{{ old('contact') }}" required autocomplete="contact" autofocus>
                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                    </span>
                                @enderror
                                <!-- <span class="form-text text-muted">Please enter room type name</span> -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-3 col-form-label">Gender:</label>
                                <div class="col-9">
                                <div class="kt-checkbox-inline">
                                    <label class="kt-checkbox">
                                    <input type="radio" checked value="true" name="gender"> Male
                                    <span></span>
                                    </label>
                                    <label class="kt-checkbox">
                                    <input type="radio" value="false" name="gender"> Female
                                    <span></span>
                                    </label>
                                </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="emailInput" class="col-3 col-form-label">Email:</label>
                                <div class="col-9">
                                <input type="text" id="emailInput" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Customer Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                    </span>
                                @enderror
                                <!-- <span class="form-text text-muted">Please enter room type name</span> -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="addressInput" class="col-3 col-form-label">Address:</label>
                                <div class="col-9">
                                <textarea type="text" id="addressInput" class="form-control @error('address') is-invalid @enderror" placeholder="Enter Customer Address" name="address" required autocomplete="address" autofocus>{{ old('address') }}</textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                    </span>
                                @enderror
                                <!-- <span class="form-text text-muted">Please enter room type name</span> -->
                                </div>
                            </div>

                            <!-- <div class="form-group row">
                                <label for="example-text-input" class="col-3 col-form-label">Email address:</label>
                                <div class="col-9">
                                <input type="email" class="form-control" placeholder="Enter email">
                                <span class="form-text text-muted">We'll never share your email with anyone else</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-3 col-form-label">Communication:</label>
                                <div class="col-9">
                                <div class="kt-checkbox-inline">
                                    <label class="kt-checkbox">
                                    <input type="checkbox"> Email
                                    <span></span>
                                    </label>
                                    <label class="kt-checkbox">
                                    <input type="checkbox"> SMS
                                    <span></span>
                                    </label>
                                    <label class="kt-checkbox">
                                    <input type="checkbox"> Phone
                                    <span></span>
                                    </label>
                                </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__foot kt-portlet__foot--solid">
                    <div class="kt-form__actions">
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-brand">Save</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>

@endsection
