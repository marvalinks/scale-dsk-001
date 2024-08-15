@extends('layouts.app')

@section('scripts')

@endsection

@section('links')
    <style>
        .center-screen {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            min-height: 85vh;
        }
        .center-screen h3 {
            /* font-size: 220px; */
            color: rgb(47, 76, 157);
        }
        .center-screen h3 span {
            font-size: 270.05px;
        }
        .center-screen h3 sup {
            font-size: 70.213px;
        }
        .center-screen h4 {
            /* font-size: 220px; */
            color: rgb(47, 76, 157);
            font-size: 53.48px;
        }
        .lg67 {
            width: 100%;
            margin-bottom: 20px;
        }
        .lg67 img {
            height: 58px;
            margin-top: 10px;
            margin-right: 10px;
        }
    </style>
@endsection
@section('content')
<div class="az-content-body pd-lg-l-40 d-flex flex-column">
    <div class="container">
        <div class="az-content-body">
            <div class="row pdetails" style="margin-top: 20px;margin-bottom:40px;text-align: center;">
                <h2>Export Report:</h2>
            </div>
            <div class="row">
                <form id="kepapp" action="{{route('portal.reports.readings.report')}}" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-md">
                            <label for="" class="form-label">Transaction ID:</label>
                            <input type="text" class="form-control" />
                        </div>
                        <div class="col-md">
                            <label for="otherNames" class="form-label">From Date:</label>
                            <input type="date" class="form-control" name="from_date" />
                        </div>
                        <div class="col-md">
                            <label for="" class="form-label">To Date:</label>
                            <input type="date" class="form-control" id="" name="to_date" />
                        </div>
                        <div class="col-md">
                            <label for="" class="form-label">Export Type</label>
                            <select name="type" required class="form-control">
                                {{-- <option value="">-choose-</option> --}}
                                <option value="excel">Excel</option>
                                {{-- <option value="pdf">PDF</option> --}}
                            </select>
                        </div>
                        <div class="col-md">
                            <button style="margin-top: 25px; width: 100%;" type="submit" class="btn btn-danger">Run Export</button>
                        </div>
                    </div> <br>
                
                </form>
            </div>
        </div>
    </div>
</div>

@endsection