@extends('layouts.app')

@section('scripts')
<script>
    function printPage() {
        window.print();
    }
</script>
@endsection

@section('links')
    <style>
        .bg3 .card-body p {
            text-transform: uppercase;
            font-size: 18px;
            font-weight: 600;
        }
        .bg3 .card-body a {
            color: inherit;
            text-decoration: auto;
        }
        .o9p {
            text-align: center;
            justify-content: center;
        }
        .lgbg{
            background: #1d2279;
        }
        .lgbg img{
            width: 60%;
            margin: auto;
        }
        .con1{
            text-align: center;
            margin-bottom: 50px;
        }
        .con1 h3{
            font-size: 20px;
        }
        .con1 h4{
            font-size: 15px;
        }
        .wt{
            font-size: 22px;
            margin-top: 35px;
        }
        .fnt04{
            font-weight: 600;
        }
        .table{
            width: 100%;
            border-top: 1px solid #7c7e7f;
        }
        .table th{
            padding: 15px!important;
            color: #474949 !important;
            font-size: 12px !important;
        }
        .m60{
            display: flex;
            align-items: center;
            justify-content: end;
        }
        .m60 input{
            height: 130px;
            width: 100%;
        }

        @media print {
            body * {
                visibility: hidden;
            }

            #printable-area, #printable-area * {
                visibility: visible;
            }

            #printable-area {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                padding: 40px;
            }
            table{
                width: 100%;
            }
            .hidden-rd{
                display: none;
            }
        }

    </style>
@endsection

@section('content')
<div class="az-content-body pd-lg-l-40 d-flex flex-column">
    <div class="row">
        <div class="col d-flex justify-content-end">
            {{-- <button data-toggle="modal" data-target="#add-application-modal" class="shadow btn btn-rounded btn-outline-indigo btn-with-icon"><i class="typcn typcn-document-add"></i> Add Application</button> --}}
        </div>
    </div>

    

    <div class="tab-content" id="printable-area">
        <div class="row con1">
            <h3>GOLDFIELDS GHANA LIMITED</h3>
            <h4>DAMANG GOLD MINE</h4>
            <h4>P.O.BOX 208 TARKWA</h4>
            <h4 class="wt">Weighing Ticket</h4>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <p class="fnt04">Transaction ID</p>
                    </div>
                    <div class="col-md-6">: {{$reading->readingId}}</div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="fnt04">Account Name</p>
                    </div>
                    <div class="col-md-6">: {{$reading->accountName}}</div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="fnt04">Source Name</p>
                    </div>
                    <div class="col-md-6">: {{$reading->sourceName}}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <p class="fnt04">Driver Name</p>
                    </div>
                    <div class="col-md-6">: {{$reading->driverName}}</div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="fnt04">Commodity Name</p>
                    </div>
                    <div class="col-md-6">: {{$reading->commodityName}}</div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="fnt04">Destination Name</p>
                    </div>
                    <div class="col-md-6">: {{$reading->destinationName}}</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <div id="all-applications-table_wrapper" class="">
                    
                    <table class="table table-hover mg-b-0 no-footer" id="all-applications-table" style="width: 100%;" aria-describedby="all-applications-table_info">
                        <thead>
                            <tr>
                                <th class="sorting" tabindex="0" aria-controls="all-applications-table" rowspan="1" colspan="1" style="width: 100px;" aria-label="Date / Time: activate to sort column ascending"><strong>Veh/Trailer/Cont.</strong></th>
                                <th class="sorting" tabindex="0" aria-controls="all-applications-table" rowspan="1" colspan="1" style="width: 161px;" aria-label="Name: activate to sort column ascending"><strong>Max Gross Weight</strong></th>
                                <th class="sorting" tabindex="0" aria-controls="all-applications-table" rowspan="1" colspan="1" style="width: 198px;" aria-label="Gender: activate to sort column ascending"><strong>Tare Weight Tare Type</strong></th>
                                <th class="sorting" tabindex="0" aria-controls="all-applications-table" rowspan="1" colspan="1" style="width: 194px;" aria-label="Phone: activate to sort column ascending"><strong>Date Time</strong></th>
                                <th class="sorting" tabindex="0" aria-controls="all-applications-table" rowspan="1" colspan="1" style="width: 195px;" aria-label="Email: activate to sort column ascending"><strong>Weigher ID/Consec No</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>{{$reading->vehicleID ?? 'GN 6439 18'}}</strong></td>
                            </tr>
                            <tr>
                                <td><strong>First Weight&nbsp;&nbsp;: &nbsp;&nbsp;</strong></td>
                                <td>
                                    {{$reading->weight}}kg <br>
                                    {{$reading->weight/1000}}t
                                </td>
                                <td></td>
                                <td>{{\Carbon\Carbon::parse($reading->created_at)->toDayDateTimeString()}}</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td><strong>First Weight User&nbsp;&nbsp;: &nbsp;&nbsp;</strong></td>
                                <td>{{$reading->userName ?? '-'}}</td>
                            </tr>
                            @if ($reading->second)
                            <tr>
                                <td><strong>Second Weight&nbsp;&nbsp;: &nbsp;&nbsp;</strong></td>
                                <td>
                                    {{$reading->second->weight}}kg <br>
                                    {{$reading->second->weight/1000}}t
                                </td>
                                <td></td>
                                <td>{{\Carbon\Carbon::parse($reading->second->created_at)->toDayDateTimeString()}}</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td><strong>Second Weight User&nbsp;&nbsp;: &nbsp;&nbsp;</strong></td>
                                <td>{{$reading->second->userName ?? '-'}}</td>
                            </tr>
                            
                            <tr>
                                <td><strong>Net Weight&nbsp;&nbsp;: &nbsp;&nbsp;</strong></td>
                                <td>
                                    {{$reading->weight - $reading->second->weight}}kg <br>
                                    {{($reading->weight - $reading->second->weight)/1000}}t
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 150px;">
            <div class="col-md-6">
                <p><strong>Ticket Notes&nbsp;&nbsp;: &nbsp;&nbsp;</strong></p>
            </div>
            <div class="col-md-6">
                <div class="row m60">
                    <p><strong>Signature:</strong></p>&nbsp;
                    {{-- <input type="text"> --}}
                </div>
            </div>
        </div>
        
    </div>
    <div class="row" style="margin-top: 200px;">
        <button onclick="printPage()" class="btn btn-primary btn-small-uppercase">Print</button>
    </div>
</div>



@endsection