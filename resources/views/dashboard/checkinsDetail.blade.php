@extends('template.backendtemplate')

@section('content')

  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row">
      <div class="col-lg-6">

        <!--begin::Portlet-->
        <div class="kt-portlet">
          <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
              <h3 class="kt-portlet__head-title">
                Room Informations
              </h3>
            </div>
          </div>
          <div class="kt-portlet__body">
            
            <p>Room No : <strong>{{$checkin->room->room_number}}</strong></p>
            <p>Room Type : <strong>{{$checkin->room->type->name}}</strong></p>
            <p>Floor : <strong>{{$checkin->room->floor->name}}</strong></p>
            <p>Rate : <strong>{{$checkin->room->mrates}}</strong> MMK</p>
            <p> Checkout Date : <strong>{{$checkin->check_out_date}}</strong> </p>
            
          </div>
        </div>

        <!--end::Portlet-->
      </div>

      <div class="col-lg-6">

        <!--begin::Portlet-->
        <div class="kt-portlet">
          <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
              <h3 class="kt-portlet__head-title">
                Guest Informations ({{count($checkin->guests)}})
              </h3>
            </div>
          </div>
          <div class="kt-portlet__body">
            @php $i=0; @endphp
            @foreach($checkin->guests as $guest)
              <div>
                <p> Name : {{$guest->name}} </p>
                <p> Phone No : {{$guest->contact}} </p>
                <p> NRC : {{$guest->nrc}} </p>
                <p> Address : {{$guest->address}} </p>
                @php $i++; @endphp

                @if(count($checkin->guests) > 1 && count($checkin->guests) != $i)
                  <hr>
                @endif
              </div>
            @endforeach

            <button type="button" class="btn btn-brand btn-label-brand btn-pill btn-sm" data-toggle="modal" data-target="#kt_modal_addInformations">Add Informations</button>

            <button type="button" class="btn btn-brand btn-label-brand btn-pill btn-sm" data-toggle="modal" data-target="#kt_modal_checkout">Checkout</button>

            <button type="button" class="btn btn-brand btn-label-brand btn-pill btn-sm" data-toggle="modal" data-target="#kt_modal_extraday">Get Extra Days</button>
          </div>
        </div>

        <!--end::Portlet-->
      </div>
    </div>
  </div>

  <div class="modal fade" id="kt_modal_addInformations" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Add Guess Informations</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <form class="kt-form" method="post" action="{{route('dashboard.addInformations')}}">
          <div class="modal-body">
            @csrf
            <input type="hidden" name="checkin_id" value="{{$checkin->id}}">
            <div class="kt-portlet__body">
                <div class="row">
                    <div class="col-md-12">
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
                            <label for="nrcInput" class="col-3 col-form-label">Nrc:</label>
                            <div class="col-9">
                            <input type="text" id="nrcInput" class="form-control @error('nrc') is-invalid @enderror" placeholder="Enter Nrc No" name="nrc" value="{{ old('nrc') }}" required autocomplete="nrc" autofocus>
                            @error('nrc')
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
                                <input type="radio" checked value="1" name="gender"> Male
                                <span></span>
                                </label>
                                <label class="kt-checkbox">
                                <input type="radio" value="0" name="gender"> Female
                                <span></span>
                                </label>
                            </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="emailInput" class="col-3 col-form-label">Email:</label>
                            <div class="col-9">
                            <input type="text" id="emailInput" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Customer Email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
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
                    </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-brand">Save</button>
            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div class="modal fade" id="kt_modal_checkout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Add Damage Items:</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <form class="kt-form" method="post" action="{{route('dashboard.checkout')}}">
          <div class="modal-body">
            @csrf
            <input type="hidden" name="checkin_transaction_id" value="{{$checkin->transaction_id}}">
            <div class="kt-portlet__body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="noOfDays" class="col-3 col-form-label">
                            Descriptions:</label>
                            <div class="col-9">
                                {{-- <input type="number" id="noOfDays" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus id="description">
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                    </span>
                                @enderror --}}

                                <select class="js-example-basic-multiple" name="damages[]" multiple="multiple" class="form-control">
                                  @foreach($damages as $damage)
                                    <option value="{{$damage->id}}">{{$damage->description}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-brand">Checkout</button>
            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div class="modal fade" id="kt_modal_extraday" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Add Extra Days:</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <form class="kt-form" method="post" action="{{route('dashboard.addExtraDays')}}">
          <div class="modal-body">
            @csrf
            <input type="hidden" name="checkin_transaction_id" value="{{$checkin->transaction_id}}">
            <div class="kt-portlet__body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="noOfDays" class="col-3 col-form-label">No of Days:</label>
                            <div class="col-9">
                                <input type="number" id="noOfDays" class="form-control @error('no_of_day') is-invalid @enderror" name="no_of_day" required autocomplete="no_of_day" autofocus id="no_of_day">
                                @error('no_of_day')
                                    <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-brand">Save</button>
            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  @section('script')
    <script type="text/javascript">
      $(document).ready(function() {
          $('.js-example-basic-multiple').select2();
      });
    </script>
  @endsection
@endsection