@extends('template.backendtemplate')

@section('content')

  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row">
      <div class="col-lg-12">

        <!--begin::Portlet-->
        <div class="kt-portlet">
          <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
              <h3 class="kt-portlet__head-title">
                Checkout Receipt
              </h3>
            </div>
          </div>
          <div class="kt-portlet__body">
            <div class="col-md-8 mx-auto">
              <h2 class="text-center">Hotel Receipt</h2>

              <p>Guest Name : <strong>{{$checkin->guests->first()->name}}</strong></p>

              <p>Checkin No : <strong>{{$checkin->transaction_id}}</strong></p>
              @php

              $total = $checkin->room->mrates * $checkin->no_of_days;

              @endphp
              <table class="table table-borderless">
                <thead class="thead-dark">
                  <tr>
                    <th>DESCRIPTION</th>
                    <th>AMOUNT</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <td colspan="2"><strong>Room Informations: ({{$checkin->no_of_days}} D)</strong></td>
                    </tr>
                  <tr>
                    <td>{{$checkin->room->type->name}} ({{$checkin->check_in_date}}/{{$checkin->check_out_date}})</td>
                    <td>{{$total}} MMK</td>
                  </tr>
                  @if(count($bydamages))
                    <tr>
                      <td colspan="2"><strong>Damage List:</strong></td>
                    </tr>
                  @endif
                  @foreach($bydamages as $damage)
                  <tr>
                    <td>{{$damage->description}}</td>
                    <td>{{$damage->mrate}} MMK</td>
                  </tr>
                  @php $total += $damage->mrate; @endphp
                  @endforeach

                  <tr>
                    <td class="text-right">Total</td>
                    <td>{{$total}} MMK</td>
                  </tr>
                </tbody>
              </table>

              <button type="button" class="btn btn-brand btn-label-brand btn-pill btn-sm" data-toggle="modal" data-target="#kt_modal_extraday">Print Out</button>
            </div>
          </div>
        </div>

        <!--end::Portlet-->
      </div>
    </div>
  </div>


  @section('script')
    <script type="text/javascript">
      
    </script>
  @endsection
@endsection