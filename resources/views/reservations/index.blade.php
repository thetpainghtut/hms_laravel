@extends('template.backendtemplate')
@section('content')
<div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart">
                    </i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Reservation List
                </h3>
            </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions">
                    <a class="btn btn-label-success btn-sm btn-bold dropdown-toggle" data-toggle="dropdown" href="#">
                        Export E
                    </a>
                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                        <ul class="kt-nav">
                            <li class="kt-nav__item">
                                <a class="kt-nav__link" href="#">
                                    <i class="kt-nav__link-icon flaticon2-line-chart">
                                    </i>
                                    <span class="kt-nav__link-text">
                                        Reports
                                    </span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a class="kt-nav__link" href="#">
                                    <i class="kt-nav__link-icon flaticon2-send">
                                    </i>
                                    <span class="kt-nav__link-text">
                                        Messages
                                    </span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a class="kt-nav__link" href="#">
                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1">
                                    </i>
                                    <span class="kt-nav__link-text">
                                        Charts
                                    </span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a class="kt-nav__link" href="#">
                                    <i class="kt-nav__link-icon flaticon2-avatar">
                                    </i>
                                    <span class="kt-nav__link-text">
                                        Members
                                    </span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a class="kt-nav__link" href="#">
                                    <i class="kt-nav__link-icon flaticon2-settings">
                                    </i>
                                    <span class="kt-nav__link-text">
                                        Settings
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <a class="btn btn-brand btn-elevate btn-icon-sm btn-sm" href="{{route('reservations.create')}}">
                        <i class="la la-plus">
                        </i>
                        Add New
                    </a>
                </div>
            </div>
        </div>
        </div>
        <div class="kt-portlet__body">
            <!--begin: Datatable -->
            <div class="dataTables_wrapper dt-bootstrap4 no-footer" id="kt_table_1_wrapper">
                <div class="row">
                    <div class="col-sm-12">
                        <table aria-describedby="kt_table_1_info" class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline" id="kt_table_1" role="grid" style="width: 1088px;">
                            <thead>
                                <tr role="row">
                                    <th aria-label="Record ID" class="dt-center sorting_disabled" colspan="1" rowspan="1" style="width: 30.5px;">
                                        <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
                                            <input class="kt-group-checkable" type="checkbox" value="">
                                                <span>
                                                </span>
                                            </input>
                                        </label>
                                    </th>
                                    <th aria-controls="kt_table_1" aria-label="Order ID: activate to sort column ascending" aria-sort="descending" class="sorting_desc" colspan="1" rowspan="1" style="width: 38.25px;" tabindex="0">
                                        Check ID
                                    </th>
                                    <th aria-controls="kt_table_1" aria-label="Country: activate to sort column ascending" class="sorting" colspan="1" rowspan="1" style="width: 62.25px;" tabindex="0">
                                        Transaction ID
                                    </th>
                                    <th aria-controls="kt_table_1" aria-label="Ship City: activate to sort column ascending" class="sorting" colspan="1" rowspan="1" style="width: 75.25px;" tabindex="0">
                                        Guest ID
                                    </th>
                                    <th aria-controls="kt_table_1" aria-label="Ship City: activate to sort column ascending" class="sorting" colspan="1" rowspan="1" style="width: 75.25px;" tabindex="0">
                                        Room ID
                                    </th>
                                    <th aria-controls="kt_table_1" aria-label="Ship City: activate to sort column ascending" class="sorting" colspan="1" rowspan="1" style="width: 75.25px;" tabindex="0">
                                        Checkin Date
                                    </th>
                                    <th aria-controls="kt_table_1" aria-label="Ship City: activate to sort column ascending" class="sorting" colspan="1" rowspan="1" style="width: 75.25px;" tabindex="0">
                                        No: Day
                                    </th>
                                    <th aria-controls="kt_table_1" aria-label="Ship City: activate to sort column ascending" class="sorting" colspan="1" rowspan="1" style="width: 75.25px;" tabindex="0">
                                        No: Adult
                                    </th>
                                    <th aria-controls="kt_table_1" aria-label="Ship City: activate to sort column ascending" class="sorting" colspan="1" rowspan="1" style="width: 75.25px;" tabindex="0">
                                        No: Children
                                    </th>
                                    <th aria-controls="kt_table_1" aria-label="Ship City: activate to sort column ascending" class="sorting" colspan="1" rowspan="1" style="width: 75.25px;" tabindex="0">
                                        Payment
                                    </th>
                                    <th aria-label="Actions" class="sorting_disabled" colspan="1" rowspan="1" style="width: 68.5px;">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                  @foreach ($reservations as $reservation)
                                <tr class="odd" role="row">
                                    <td class="dt-center" tabindex="0">
                                        <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
                                            <input class="kt-checkable" type="checkbox" value="">
                                                <span>
                                                </span>
                                            </input>
                                        </label>
                                    </td>
                                    <td class="sorting_1">
                                        {{$i++}}
                                    </td>
                                    <td>
                                        {{$reservation->transaction_id}}
                                    </td>
                                    <td>
                                        {{$reservation->guest_id}}
                                    </td>
                                    <td>
                                        {{$reservation->room_id}}
                                    </td>
                                    <td>
                                        {{$reservation->check_in_date}}
                                    </td>
                                    <td>
                                        {{$reservation->no_of_days}}
                                    </td>
                                    <td>
                                        {{$reservation->no_of_adults}}
                                    </td>
                                    <td>
                                        {{$reservation->no_of_children}}
                                    </td>
                                    <td>
                                        {{$reservation->advance_payment}}
                                    </td>
                                    <td nowrap="">
                                        <span class="dropdown">
                                            <a aria-expanded="true" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" href="#">
                                                <i class="la la-ellipsis-h">
                                                </i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">
                                                    <i class="la la-edit">
                                                    </i>
                                                    Edit Details
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i class="la la-leaf">
                                                    </i>
                                                    Update Status
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i class="la la-print">
                                                    </i>
                                                    Generate Report
                                                </a>
                                            </div>
                                        </span>
                                        <!-- <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View"><i class="la la-edit"></i></a> -->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
