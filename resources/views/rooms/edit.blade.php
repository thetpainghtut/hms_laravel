@extends('template.backend')

@section('content')
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-1">
          <h3 class="content-header-title">Room Management</h3>
        </div>
        <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
          <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a>
              </li>
              <li class="breadcrumb-item"><a href="#">Starters Kit</a>
              </li>
              <li class="breadcrumb-item active">Boxed Layout
              </li>
            </ol>
          </div>
        </div>
      </div>
      <div class="content-body">
        <section id="configuration">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Room Edit From</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a href="{{route('rooms.index')}}"><i class="ft-list font-large-1"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body ">
                                
                                <form method="post" action="{{route('rooms.update',$room->id)}}" enctype="multipart/form-data">
                                  @csrf
                                  @method('PUT')
                                
                                  <div class="form-body">

                                      <div class="form-group">
                                          <label for="complaintinput1">Room No</label>
                                          <input type="text" id="complaintinput1" class="form-control round @error('room_no') is-invalid @enderror" placeholder="room number" name="room_no" value="{{ $room->room_number }}" required autocomplete="room_no" autofocus>
                                          @error('room_no')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                          @enderror
                                      </div>

                                      <div class="form-group">
                                          <label for="complaintinput2">Room Photos <strong>** .jpg | .png</strong></label>
                                        <ul class="nav nav-tabs">
                                          <li class="nav-item">
                                            <a href="#old" class="nav-link active" data-toggle="tab">Old</a>
                                          </li>
                                          <li class="nav-item">
                                            <a href="#new" class="nav-link" data-toggle="tab">New</a>
                                          </li>
                                        </ul>
                                        <div class="tab-content py-2">
                                          <div class="tab-pane fade show active" id="old">
                                            @foreach($room->photos as $photo)
                                            <img src="{{asset($photo->file_dir)}}" class="img-fluid w-25">
                                            @endforeach
                                            <input type="hidden" name="oldphotos" value="{{$room->photos}}">
                                          </div>
                                          <div class="tab-pane fade" id="new">
                                            <input type="file" id="complaintinput2" class="form-control-file @error('room_photos') is-invalid @enderror" name="room_photos[]" value="{{ old('room_photos') }}" autocomplete="room_photos" autofocus multiple>
                                            @error('room_photos')
                                              <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                              </span>
                                            @enderror
                                          </div>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                          <label for="complaintinput6">Room Type</label>

                                          <select name="room_type" class="form-control round @error('room_type') is-invalid @enderror" required>
                                            <option value="">Choose Room Type</option>
                                            @foreach($roomtypes as $row)
                                              <option value="{{$row->id}}" @if($room->type_id == $row->id) {{'selected'}} @endif>{{$row->name}}</option>
                                            @endforeach
                                          </select>

                                          @error('room_type')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                          @enderror

                                          {{-- <input type="text" id="complaintinput6" class="form-control round @error('room_type') is-invalid @enderror" placeholder="room type" name="room_type" value="{{ old('room_type') }}" required autocomplete="room_type" autofocus> --}}
                                          
                                      </div>

                                      <div class="form-group">
                                          <label for="complaintinput3">Room Rate: (Myanmar)</label>
                                          <input type="number" id="complaintinput3" class="form-control round @error('room_mrate') is-invalid @enderror" placeholder="room number" name="room_mrate" value="{{ $room->mrates }}" required autocomplete="room_mrate" autofocus>
                                          @error('room_mrate')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                          @enderror
                                      </div>

                                      <div class="form-group">
                                          <label for="complaintinput4">Room Rate: (USD)</label>
                                          <input type="number" id="complaintinput4" class="form-control round @error('room_urate') is-invalid @enderror" placeholder="room number" name="room_urate" value="{{ $room->urate }}" required autocomplete="room_urate" autofocus>
                                          @error('room_urate')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                          @enderror
                                      </div>

                                      {{-- <div class="form-group">
                                          <label for="complaintinput5">No of Occupancy</label>
                                          <input type="number" id="complaintinput5" class="form-control round @error('no_of_occupancy') is-invalid @enderror" placeholder="No of Occupancy" name="no_of_occupancy" value="{{ $room->no_of_occupancy }}" required autocomplete="no_of_occupancy" autofocus>
                                          @error('no_of_occupancy')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                          @enderror
                                      </div> --}}

                                  </div>

                                  <div class="form-actions">
                                      <button type="reset" class="btn btn-warning mr-1">
                                          <i class="ft-x"></i> Cancel
                                      </button>
                                      <button type="submit" class="btn btn-primary">
                                          <i class="fa fa-check-square-o"></i> Update
                                      </button>
                                  </div>
                                  
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      </div>
    </div>
  </div>
@endsection