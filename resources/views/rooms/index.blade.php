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
                    Room List
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a class="btn btn-label-success btn-sm btn-bold dropdown-toggle" data-toggle="dropdown" href="#">
                            Export
                        </a>
                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                            <ul class="kt-nav">
                                <li class="kt-nav__item">
                                    <a class="kt-nav__link" data-toggle="modal" href="#kt_datepicker_modal">
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
                        <a class="btn btn-brand btn-elevate btn-icon-sm btn-sm" href="{{route('rooms.create')}}">
                            <i class="la la-plus">
                            </i>
                            Add New
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-light" style="padding: 10px 24px;">
            <div class="row">
                <div class="col-9">
                </div>
                <div class="col-3 ">
                    <input class="form-control" id="searchDataTable" placeholder="search.." type="text">
                    </input>
                </div>
            </div>
        </div>
        <div class="table-overflow">
            <table class="table table-striped" id="dataTableHMS">
                <thead class="thead-light">
                    <tr>
                        <th>
                            Room ID
                        </th>
                        <th>
                            Room No
                        </th>
                        <th>
                            Room Type
                        </th>
                        <th>
                            Rate: (MMK)
                        </th>
                        <th>
                            Status
                        </th>
                        <th width="100">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1; @endphp
                              @foreach ($rooms as $room)
                    <tr>
                        <td class="sorting_1">
                            <b>
                                {{$i++}}
                            </b>
                        </td>
                        <td>
                            {{$room->room_number}}
                        </td>
                        <td>
                            {{$room->type->name}}
                        </td>
                        <td>
                            {{$room->mrates}}
                        </td>
                        <td>
                            {{$room->available()}}
                        </td>
                        <td>
                            <a class="btn btn-warning btn-icon btn-sm" href="javascript:;">
                                <i class="fa fa-edit">
                                </i>
                            </a>
                            <a class="btn btn-danger btn-icon btn-sm deleteRecord" href="javascript:;" id="delete">
                                <i class="fa fa-trash">
                                </i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="kt_datepicker_modal" role="dialog" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Bootstrap Date Picker Examples
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true" class="la la-remove">
                    </span>
                </button>
            </div>
            <form class="kt-form kt-form--fit kt-form--label-right">
                <div class="modal-body">
                    <div class="form-group row kt-margin-t-20">
                        <label class="col-form-label col-lg-3 col-sm-12">
                            Minimum Setup
                        </label>
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            <input class="form-control" id="kt_datepicker_1_modal" placeholder="Select date" readonly="" type="date">
                            </input>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12">
                            Input Group Setup
                        </label>
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            <div class="input-group date">
                                <input class="form-control" id="kt_datepicker_2_modal" placeholder="Select date" readonly="" type="date">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o">
                                            </i>
                                        </span>
                                    </div>
                                </input>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row kt-margin-b-20">
                        <label class="col-form-label col-lg-3 col-sm-12">
                            Enable Helper Buttons
                        </label>
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            <div class="input-group date">
                                <input class="form-control" id="kt_datepicker_3_modal" type="text" value="05/20/2017">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar">
                                            </i>
                                        </span>
                                    </div>
                                </input>
                            </div>
                            <span class="form-text text-muted">
                                Enable clear and today helper buttons
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-brand" data-dismiss="modal" type="button">
                        Close
                    </button>
                    <button class="btn btn-secondary" type="button">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
