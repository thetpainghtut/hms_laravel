@extends('template.backendtemplate')

@section('content')

  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet" style="margin-bottom: 0 !important;">
          <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
              <h3 class="kt-portlet__head-title">
                Room Service Form
              </h3>
            </div>
          </div>

          <!--begin::Form-->
          <form class="kt-form" method="post" action="{{route('roomservices.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="kt-portlet__body">
              <div class="form-group row">
                <label for="complaintinput1" class="col-3 col-form-label">Room Service Name</label>
                <div class="col-9">
                  <input type="text" id="complaintinput1" class="form-control round @error('room_service_name') is-invalid @enderror" placeholder="room service name" name="room_service_name" value="{{ old('room_service_name') }}" required autocomplete="room_service_name" autofocus>
                  @error('room_service_name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="complaintinput1" class="col-3 col-form-label">Room Service Icon <strong>** .png</strong></label>
                <div class="col-9">
                  <input type="file" id="complaintinput1" class="form-control-file @error('room_service_icon') is-invalid @enderror" name="room_service_icon" value="{{ old('room_service_icon') }}" required autocomplete="room_service_icon" autofocus>
                  @error('room_service_icon')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="kt-portlet__foot kt-portlet__foot--solid">
              <div class="kt-form__actions">
                <div class="row">
                  <div class="col-3">
                  </div>
                  <div class="col-9">
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