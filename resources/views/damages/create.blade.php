@extends('template.backendtemplate')

@section('content')

  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet" style="margin-bottom: 0 !important;">
          <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
              <h3 class="kt-portlet__head-title">
                Damage Form
              </h3>
            </div>
          </div>

          <!--begin::Form-->
          <form class="kt-form" method="post" action="{{route('damages.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="kt-portlet__body">
              <div class="form-group row">
                <label for="complaintinput1" class="col-3 col-form-label">Description:</label>
                <div class="col-9">
                  <textarea id="complaintinput1" class="form-control round @error('description') is-invalid @enderror" placeholder="Damage Description" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus></textarea>
                  @error('description')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="complaintRate" class="col-3 col-form-label">Rate: (MMK)</label>
                <div class="col-9">
                  <input type="number" id="complaintRate" class="form-control @error('rate') is-invalid @enderror" name="rate" value="{{ old('rate') }}" required autocomplete="rate" autofocus>
                  @error('rate')
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