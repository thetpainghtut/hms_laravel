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
                    Damage Charges List
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
                        <a class="btn btn-brand btn-elevate btn-icon-sm btn-sm" href="{{route('damages.create')}}">
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
                    <tr role="row">
                        <th>
                            ID
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Rate (MMK)
                        </th>
                        <th width="100">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1; @endphp
                                @foreach ($damages as $damage)
                    <tr>
                        <td>
                            <b>
                                {{$i++}}
                            </b>
                        </td>
                        <td>
                            {{$damage->description}}
                        </td>
                        <td>
                            {{$damage->mrate}}
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
@endsection
