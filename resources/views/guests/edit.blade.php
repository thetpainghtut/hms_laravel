@extends('template.backend')

@section('content')
<div class="kt-container kt-container--fluid">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand fa fa-user-alt">
                    </i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Update guest
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <form action="{{route('guests.update',$guest->id)}}" method="post">
                @csrf
        @method('PUT')
                <div class="form-body">
                    <div class="form-group">
                        <label for="complaintinput1">
                            Name
                        </label>
                        <input autocomplete="name" autofocus="" class="form-control round @error('name') is-invalid @enderror" id="complaintinput1" name="name" placeholder="Guest name" required="" type="text" value="{{ $guest->name }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </input>
                    </div>
                    <div class="form-group">
                        <label for="addressInput">
                            Address
                        </label>
                        <textarea autocomplete="address" autofocus="" class="form-control round @error('address') is-invalid @enderror" id="addressInput" name="address" placeholder="Guest Address" required="">
                            {{ $guest->address }}
                        </textarea>
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="addressContact">
                            Contact
                        </label>
                        <input autocomplete="contact" autofocus="" class="form-control round @error('contact') is-invalid @enderror" id="addressContact" name="contact" placeholder="Guest Contact" required="" type="text" value="{{ $guest->contact }}">
                            @error('contact')
                            <span class="invalid-feedback" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </input>
                    </div>
                    <div class="form-group">
                        <label for="addressEmail">
                            Email
                        </label>
                        <input autocomplete="email" autofocus="" class="form-control round @error('email') is-invalid @enderror" id="addressEmail" name="email" placeholder="Guest Email" required="" type="email" value="{{ $guest->email }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </input>
                    </div>
                    <div class="form-group">
                        <label>
                            Gender
                        </label>
                        <div>
                            <label class="kt-radio kt-radio--tick kt-radio--success mr-2">
                                <input @if($guest-="" class="custom-control-input" id="customRadio1" name="gender" type="radio" value="1">
                                    gender == 1) {{'checked'}} @endif>
                                            Male
                                    <span>
                                    </span>
                                </input>
                            </label>
                            <label class="kt-radio kt-radio--tick kt-radio--success">
                                <input @if($guest-="" class="custom-control-input" id="customRadio2" name="gender" type="radio" value="0">
                                    gender == 0) {{'checked'}} @endif>
                                            Female
                                    <span>
                                    </span>
                                </input>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-actions text-right">
                    <button class="btn btn-secondary mr-1" type="reset">
                        <i class="ft-x">
                        </i>
                        Cancel
                    </button>
                    <button class="btn btn-brand" type="submit">
                        <i class="fa fa-check-square-o">
                        </i>
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
