@extends('template.backendtemplate')

@section('content')
<div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__body">
                    
                    <form method="post" action="{{route('logout')}}">
                        @csrf
                        <input type="submit" name="btnsubmit" value="Logout">
                    </form>

                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-target="#kt_tabs_1_1" data-toggle="tab" href="#">
                                Available
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_tabs_1_3">
                                Occupied
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_tabs_1_4">
                                Booked
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_tabs_1_1" role="tabpanel">
                            <div class="accordion" id="accordionExample">
                                @php $i=0; 
                                @endphp
                                @foreach($roomtypes as $type)
                                @if(in_array($type->id,$avaicol))
                                @php $i++; @endphp
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button aria-controls="collapse{{$i}}" aria-expanded="true" class="btn btn-link btn-block text-left" data-target="#collapse{{$i}}" data-toggle="collapse" type="button">
                                                {{$type->name}}
                                            </button>
                                        </h2>
                                    </div>
                                    <div aria-labelledby="headingOne" class="collapse @if($i==1){{'show'}} @endif" data-parent="#accordionExample" id="collapse{{$i}}">
                                        <div class="card-body">
                                            <div class="row">
                                                @foreach($type->rooms as $room)
                                                @if($room->available() == 'available')
                                                <div class="col-md-2 text-center">
                                                    <h3>
                                                        {{$room->room_number}}
                                                    </h3>
                                                    <button class="btn btn-brand btn-label-brand btn-pill btn-sm btn-checkins" data-roomnumber="{{$room->room_number}}" data-roomtype="{{$room->type->id}}" type="button">
                                                        Checkins
                                                    </button>
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane" id="kt_tabs_1_3" role="tabpanel">
                            <div class="accordion" id="accordionExample">
                                @php 
                                $i=0; 
                                @endphp

                                @foreach($roomtypes as $type)
                                @if(in_array($type->id,$occucol))
                                @php $i++; @endphp
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button aria-controls="collapse{{$i}}" aria-expanded="true" class="btn btn-link btn-block text-left" data-target="#collapse{{$i}}" data-toggle="collapse" type="button">
                                                {{$type->name}}
                                            </button>
                                        </h2>
                                    </div>
                                    <div aria-labelledby="headingOne" class="collapse @if($i==1){{'show'}} @endif" data-parent="#accordionExample" id="collapse{{$i}}">
                                        <div class="card-body">
                                            <div class="row">
                                                @foreach($type->rooms as $room)
          @if($room->available() == 'occupied')
                                                <div class="col-md-2 text-center">
                                                    <h3>
                                                        {{$room->room_number}}
                                                    </h3>
                                                    <a class="btn btn-brand btn-label-brand btn-pill btn-sm" href="{{route('dashboard.checkinsDetail',$room->id)}}">
                                                        Detail
                                                    </a>
                                                </div>
                                                @endif
          @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
    @endforeach
                            </div>
                        </div>
                        <div class="tab-pane" id="kt_tabs_1_4" role="tabpanel">
                            <div class="row">
                                @foreach($books as $room)
                                <div class="col-md-2 text-center">
                                    <h3>
                                        {{$room->room_number}}
                                    </h3>
                                    <button class="btn btn-brand btn-label-brand btn-pill btn-sm" data-target="#kt_modal_call" data-toggle="modal" type="button">
                                        Call
                                    </button>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Portlet-->
        </div>
    </div>
</div>
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="kt_modal_checkins" role="dialog" style="display: none;" tabindex="-1">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="exampleModalLabel">
                    New Checkin Form:
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <form action="{{route('checkins.store')}}" class="kt-form" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="kt-portlet__body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="mb-4">
                                    Room Informations:
                                </h5>
                                <div class="form-group row">
                                    <label class="col-3 col-form-label" for="transactionInput">
                                        Transaction No:
                                    </label>
                                    <div class="col-9">
                                        <input autocomplete="transaction_no" autofocus="" class="form-control @error('transaction_no') is-invalid @enderror" id="transactionInput" name="transaction_no" readonly="" required="" type="text">
                                            @error('transaction_no')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                            <!-- <span class="form-text text-muted">Please enter room type name</span> -->
                                        </input>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3 col-form-label" for="roomTypeInput">
                                        Room Types:
                                    </label>
                                    <div class="col-9">
                                        <select class="form-control" disabled="true" id="roomTypeInput" name="room_type">
                                            <optgroup label="Room Types">
                                                @foreach($roomtypes as $type)
                                                <option value="{{$type->id}}">
                                                    {{$type->name}}
                                                </option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3 col-form-label" for="roomInput">
                                        Room No:
                                    </label>
                                    <div class="col-9">
                                        <input autocomplete="room_no" autofocus="" class="form-control @error('room_no') is-invalid @enderror" id="roomInput" name="room_no" readonly="" type="text" value="">
                                            @error('room_no')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </input>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3 col-form-label" for="checkInInput">
                                        CheckIn Date:
                                    </label>
                                    <div class="col-9">
                                        <input autocomplete="checkin" autofocus="" class="form-control @error('checkin') is-invalid @enderror" id="checkInInput" name="checkin" required="" type="date" value="">
                                            @error('checkin')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </input>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3 col-form-label" for="checkOutInput">
                                        CheckOut Date:
                                    </label>
                                    <div class="col-9">
                                        <input autocomplete="checkout" autofocus="" class="form-control @error('checkout') is-invalid @enderror" id="checkOutInput" name="checkout" required="" type="date" value="">
                                            @error('checkout')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                            <!-- <span class="form-text text-muted">Please enter room type name</span> -->
                                        </input>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3 col-form-label" for="adultInput">
                                        Adults:
                                    </label>
                                    <div class="col-9">
                                        <input autocomplete="adult" autofocus="" class="form-control @error('adult') is-invalid @enderror" id="adultInput" name="adult" required="" type="number" value="">
                                            @error('adult')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                            <!-- <span class="form-text text-muted">Please enter room type name</span> -->
                                        </input>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3 col-form-label" for="childrenInput">
                                        Children:
                                    </label>
                                    <div class="col-9">
                                        <input autocomplete="children" autofocus="" class="form-control @error('children') is-invalid @enderror" id="childrenInput" name="children" required="" type="number" value="">
                                            @error('children')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                            <!-- <span class="form-text text-muted">Please enter room type name</span> -->
                                        </input>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5 class="mb-4">
                                    Customer Informations:
                                </h5>
                                <div class="form-group row">
                                    <label class="col-3 col-form-label" for="nameInput">
                                        Name:
                                    </label>
                                    <div class="col-9">
                                        <input autocomplete="name" autofocus="" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" placeholder="Enter Customer Name" required="" type="text" value="{{ old('name') }}">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </input>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3 col-form-label" for="contactInput">
                                        Contact:
                                    </label>
                                    <div class="col-9">
                                        <input autocomplete="contact" autofocus="" class="form-control @error('contact') is-invalid @enderror" id="contactInput" name="contact" placeholder="Enter Phone No" required="" type="text" value="{{ old('contact') }}">
                                            @error('contact')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </input>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3 col-form-label" for="nrcInput">
                                        Nrc:
                                    </label>
                                    <div class="col-9">
                                        <input autocomplete="nrc" autofocus="" class="form-control @error('nrc') is-invalid @enderror" id="nrcInput" name="nrc" placeholder="Enter Nrc No" required="" type="text" value="{{ old('nrc') }}">
                                            @error('nrc')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                            <!-- <span class="form-text text-muted">Please enter room type name</span> -->
                                        </input>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3 col-form-label" for="example-text-input">
                                        Gender:
                                    </label>
                                    <div class="col-9">
                                        <div class="kt-checkbox-inline">
                                            <label class="kt-checkbox">
                                                <input checked="" name="gender" type="radio" value="1">
                                                    Male
                                                    <span>
                                                    </span>
                                                </input>
                                            </label>
                                            <label class="kt-checkbox">
                                                <input name="gender" type="radio" value="0">
                                                    Female
                                                    <span>
                                                    </span>
                                                </input>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3 col-form-label" for="emailInput">
                                        Email:
                                    </label>
                                    <div class="col-9">
                                        <input autocomplete="email" autofocus="" class="form-control @error('email') is-invalid @enderror" id="emailInput" name="email" placeholder="Enter Customer Email" required="" type="text" value="{{ old('email') }}">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                            <!-- <span class="form-text text-muted">Please enter room type name</span> -->
                                        </input>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3 col-form-label" for="addressInput">
                                        Address:
                                    </label>
                                    <div class="col-9">
                                        <textarea autocomplete="address" autofocus="" class="form-control @error('address') is-invalid @enderror" id="addressInput" name="address" placeholder="Enter Customer Address" required="" type="text">
                                            {{ old('address') }}
                                        </textarea>
                                        @error('address')
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
                    <button class="btn btn-brand" type="submit">
                        Save
                    </button>
                    <button class="btn btn-secondary" data-dismiss="modal" type="reset">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function () {
      // alert('ok');
      $('.btn-checkins').click(function () {
        let roomnumber = $(this).data('roomnumber');
        let roomtype = $(this).data('roomtype');

        // alert(roomnumber + roomtype);
        $('#roomTypeInput').val(roomtype);
        $('#roomInput').val(roomnumber);
        $('#kt_modal_checkins').modal('show');
      })


      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      getTransactionId();

      function getTransactionId(){
        $.get("{{route('gettransactionid')}}",function (response) {
          console.log(response);
          $('#transactionInput').val(response);
        })
      }
    })
</script>
@endsection
