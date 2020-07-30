@extends('template.backendtemplate')

@section('content')

  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet" style="margin-bottom: 0 !important;">
          <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
              <h3 class="kt-portlet__head-title">
                Room Form
              </h3>
            </div>
          </div>

          <!--begin::Form-->
          <form class="kt-form" method="post" action="{{route('rooms.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="kt-portlet__body">

              <div class="form-group row">
                <label for="complaintinput6" class="col-3 col-form-label">Floors</label>
                <div class="col-9">
                  <select name="floor" class="form-control round @error('floor') is-invalid @enderror" required id="floor">
                    <option value="">Choose Floor</option>
                    @foreach($floors as $row)
                      <option value="{{$row->id}}" data-name={{$row->name}}>{{$row->name}}</option>
                    @endforeach
                  </select>

                  @error('floor')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="complaintRoomNo" class="col-3 col-form-label">Room No</label>
                <div class="col-9">
                  <input type="text" id="complaintRoomNo" class="form-control round @error('room_no') is-invalid @enderror" placeholder="room number" name="room_no" value="{{ old('room_no') }}" required autocomplete="room_no" autofocus readonly>
                  @error('room_no')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="complaintinput6" class="col-3 col-form-label">Room Type</label>
                <div class="col-9">
                  <select name="room_type" class="form-control round @error('room_type') is-invalid @enderror" required>
                    <option value="">Choose Room Type</option>
                    @foreach($roomtypes as $row)
                      <option value="{{$row->id}}">{{$row->name}}</option>
                    @endforeach
                  </select>

                  @error('room_type')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="complaintinput2" class="col-3 col-form-label">Room Photos <strong>** .jpg | .png</strong></label>
                <div class="col-9">
                  <input type="file" id="complaintinput2" class="form-control-file @error('room_photos') is-invalid @enderror" name="room_photos[]" value="{{ old('room_photos') }}" required autocomplete="room_photos" autofocus multiple>
                  @error('room_photos')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="complaintinput3" class="col-3 col-form-label">Room Rate: (MMK)</label>
                <div class="col-9">
                  <input type="number" id="complaintinput3" class="form-control round @error('room_mrate') is-invalid @enderror" placeholder="Rate " name="room_mrate" value="{{ old('room_mrate') }}" required autocomplete="room_mrate" autofocus>
                  @error('room_mrate')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="complaintinput4" class="col-3 col-form-label">Room Rate: (USD)</label>
                <div class="col-9">
                  <input type="number" id="complaintinput4" class="form-control round @error('room_urate') is-invalid @enderror" placeholder="Rate " name="room_urate" value="{{ old('room_urate') }}" required autocomplete="room_urate" autofocus>
                  @error('room_urate')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              {{-- <div class="form-group row">
                <label for="complaintinput5" class="col-3 col-form-label">No of Occupancy</label>
                <div class="col-9">
                  <input type="number" id="complaintinput5" class="form-control round @error('no_of_occupancy') is-invalid @enderror" placeholder="No of Occupancy" name="no_of_occupancy" value="{{ old('no_of_occupancy') }}" required autocomplete="no_of_occupancy" autofocus>
                  @error('no_of_occupancy')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div> --}}
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
@section('script')
  <script type="text/javascript">
    $(document).ready(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $('#floor').change(function () {
        let floor_name = $("#floor option:selected").text();
        // alert(floor_name);
        let floor_arr = floor_name.split('-');
        let floor_no = floor_arr[0];
        // alert(floor_no);

        $.post("{{route('getroomno')}}",{floor:floor_no},function (response) {
          console.log(response);
          $('#complaintRoomNo').val(response);
        })

      })
    })
  </script>
@endsection