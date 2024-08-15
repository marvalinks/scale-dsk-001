@extends('layouts.app')

@section('scripts')

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

    </style>
@endsection

@section('content')
<div class="az-content-body pd-lg-l-40 d-flex flex-column">
    <div class="row">
        <div class="col d-flex justify-content-end">
            {{-- <button data-toggle="modal" data-target="#add-application-modal" class="shadow btn btn-rounded btn-outline-indigo btn-with-icon"><i class="typcn typcn-document-add"></i> Add Application</button> --}}
        </div>
    </div>

    <div class="az-content-breadcrumb">
        <span>Home</span>
        <span>Applications</span>
    </div>

    
    
    <h2 class="az-content-title mb-3">Scale Readings</h2>

    <p class="text-info"><i class="fa fa-info-circle"></i> Click anywhere on a row to view the full details of an application</p>

    <ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="all-applications-tab" data-toggle="tab" href="#all-applications" role="tab" aria-controls="all-applications" aria-selected="true" style="background: #000000;">All Readings</a>
        </li>

       
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="all-applications" role="tabpanel" aria-labelledby="All applications">
            <h5 class="mg-10 ml-0">&nbsp;</h5>

            <div class="table-responsive">
                <div id="all-applications-table_wrapper" class="">
                    
                    <table class="table table-hover mg-b-0 no-footer" id="all-applications-table" style="width: 100%;" aria-describedby="all-applications-table_info">
                        <thead>
                            <tr>
                                <th class="sorting" tabindex="0" aria-controls="all-applications-table" rowspan="1" colspan="1" style="width: 80px;" aria-label="ID: activate to sort column ascending">ID</th>
                                <th class="sorting" tabindex="0" aria-controls="all-applications-table" rowspan="1" colspan="1" style="width: 100px;" aria-label="Date / Time: activate to sort column ascending">Date</th>
                                <th class="sorting" tabindex="0" aria-controls="all-applications-table" rowspan="1" colspan="1" style="width: 131px;" aria-label="Name: activate to sort column ascending">Acc. Name</th>
                                <th class="sorting" tabindex="0" aria-controls="all-applications-table" rowspan="1" colspan="1" style="width: 158px;" aria-label="Gender: activate to sort column ascending">SRC. Name</th>
                                <th class="sorting" tabindex="0" aria-controls="all-applications-table" rowspan="1" colspan="1" style="width: 144px;" aria-label="Phone: activate to sort column ascending">DVR. Name</th>
                                <th class="sorting" tabindex="0" aria-controls="all-applications-table" rowspan="1" colspan="1" style="width: 135px;" aria-label="Email: activate to sort column ascending">CMM. Name</th>
                                <th class="sorting" tabindex="0" aria-controls="all-applications-table" rowspan="1" colspan="1" style="width: 135px;" aria-label="Email: activate to sort column ascending">DES. Name</th>
                                <th class="sorting" tabindex="0" aria-controls="all-applications-table" rowspan="1" colspan="1" style="width: 135px;" aria-label="Email: activate to sort column ascending">Weight 1 (KG)</th>
                                <th class="sorting" tabindex="0" aria-controls="all-applications-table" rowspan="1" colspan="1" style="width: 135px;" aria-label="Email: activate to sort column ascending">Weight 2 (KG)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($readings as $data)
                            <tr class="odd">
                                <td>
                                    <a href="{{route('portal.reports.print.ink', [$data->readingId])}}" class="identifyingClass" >{{$data->readingId}}</a>
                                </td>
                                <td>{{\Carbon\Carbon::parse($data->created_at)->toFormattedDateString()}}</td>
                                <td>{{$data->accountName}}</td>
                                <td>{{$data->sourceName}}</td>
                                <td>{{$data->driverName}}</td>
                                <td>{{$data->commodityName}}</td>
                                <td>{{$data->destinationName}}</td>
                                <td><strong>{{number_format($data->weight, 2)}}</strong></td>
                                @if ($data->second)
                                <td><strong>{{number_format($data->second ? $data->second->weight : 0, 2)}}</strong></td>
                                @else
                                <td><a href="{{route('portal.second.readings', [$data->readingId])}}">add reading</a></td> 
                                @endif
                                @if (auth()->user()->roleID == 1)
                                <td>
                                    <a onclick="return confirm('Are you sure ?')" href="{{route('portal.delete.readings', [$data->readingId])}}" style="color: red;">del</a>
                                </td>
                                @endif
                            </tr>
                            
                            @empty
                            <tr class="odd">
                                <td valign="top" colspan="6" class="dataTables_empty">No data available in table</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            {{$readings->links()}}
        </div>

    </div>
</div>



@endsection