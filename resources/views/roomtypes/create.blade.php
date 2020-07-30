@extends('template.backendtemplate')

@section('content')

  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet" style="margin-bottom: 0 !important;">
          <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
              <h3 class="kt-portlet__head-title">
                Room Type Form
              </h3>
            </div>
          </div>

          <!--begin::Form-->
          <form class="kt-form" method="post" action="{{route('roomtypes.store')}}">
            @csrf
            <div class="kt-portlet__body">
              <div class="form-group row">
                <label for="example-text-input" class="col-3 col-form-label">Name:</label>
                <div class="col-9">
                  <input type="text" class="form-control @error('room_type_name') is-invalid @enderror" placeholder="Enter room type name" name="room_type_name" value="{{ old('room_type_name') }}" required autocomplete="room_type_name" autofocus>
                  @error('room_type_name')
                    <span class="invalid-feedback" role="alert">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-form-label col-lg-3 col-sm-12">Select Services</label>
                <div class="col-md-9 col-sm-12">
                  <select class="form-control kt-select2" id="kt_select2_3" name="param" multiple="multiple">
                    <optgroup label="Select Services">
                      @foreach($services as $service)
                        <option value="{{$service->id}}">{{$service->name}}</option>
                      @endforeach
                    </optgroup>
                  </select>
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