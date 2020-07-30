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
                            <h4 class="card-title">Room Type Edit From</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a href="roomtypes/"><i class="ft-list font-large-1"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body ">
                                
                                <form method="post" action="{{route('roomtypes.update',$roomtype->id)}}">
                                  @csrf
                                  @method('PUT')
                                
                                  <div class="form-body">

                                      <div class="form-group">
                                          <label for="complaintinput1">Room Type Name</label>
                                          <input type="text" id="complaintinput1" class="form-control round @error('room_type_name') is-invalid @enderror" name="room_type_name" value="<?=$roomtype->name?>" required autocomplete="room_type_name" autofocus>
                                          @error('room_type_name')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                          @enderror
                                      </div>

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