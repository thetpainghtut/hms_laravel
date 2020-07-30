@extends('template.backendtemplate')
@section('content')
<div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart">
                    </i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Guest Form
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <!--begin: Datatable -->
            <div class="card-content collapse show">
                <div class="card-body ">
                    <form action="{{route('guests.store')}}" method="post">
                        @csrf
                        <div class="form-body">
                            <div class="form-group row">
                                <label class="col-3 col-form-label" for="complaintinput1">
                                    Name:
                                </label>
                                <div class="col-9">
                                    <input autocomplete="name" autofocus="" class="form-control round @error('name') is-invalid @enderror" id="complaintinput1" name="name" placeholder="Guest name" required="" type="text" value="{{ old('name') }}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                        @enderror
                                    </input>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label" for="addressInput">
                                    Address
                                </label>
                                <div class="col-9">
                                    <textarea autocomplete="address" autofocus="" class="form-control round @error('address') is-invalid @enderror" id="addressInput" name="address" placeholder="Guest Address" required="">
                                        {{ old('address') }}
                                    </textarea>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label" for="addressContact">
                                    Contact
                                </label>
                                <div class="col-9">
                                    <input autocomplete="contact" autofocus="" class="form-control round @error('contact') is-invalid @enderror" id="addressContact" name="contact" placeholder="Guest Contact" required="" type="text" value="{{ old('contact') }}">
                                        @error('contact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                        @enderror
                                    </input>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label" for="addressEmail">
                                    Email
                                </label>
                                <div class="col-9">
                                    <input autocomplete="email" autofocus="" class="form-control round @error('email') is-invalid @enderror" id="addressEmail" name="email" placeholder="Guest Email" required="" type="email" value="{{ old('email') }}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                        @enderror
                                    </input>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">
                                    Gender
                                </label>
                                <div class="col-9">
                                    <div class="kt-checkbox-inline">
                                        <label class="kt-checkbox">
                                            <input checked="" name="gender" type="radio" value="true">
                                                Male
                                                <span>
                                                </span>
                                            </input>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input name="gender" type="radio" value="false">
                                                Female
                                                <span>
                                                </span>
                                            </input>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Minimum Setup
                                </label>
                                <div class="col-lg-4 col-md-9 col-sm-12">
                                    <input class="form-control" id="kt_datetimepicker_1" placeholder="Select date & time" readonly="" type="text"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions row">
                            <label class="col-3">
                            </label>
                            <div class="col-9">
                                <button class="btn btn-brand" type="submit">
                                    Save
                                </button>
                                <button class="btn btn-secondary" type="reset">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--end: Datatable -->
        </div>
    </div>
</div>
@endsection
