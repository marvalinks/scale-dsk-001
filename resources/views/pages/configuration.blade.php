@extends('layouts.app')

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
                <h2>System Configurations:</h2>
            </div>
            <div class="row">
                <form id="kepapp" action="{{route('portal.configurations')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md">
                            <label for="otherNames" class="form-label">PORT:</label>
                            <input type="text" class="form-control" value="{{$config->port ?? ''}}" name="port" required />
                        </div>
                        <div class="col-md">
                            <label for="lastName" class="form-label">SCRIPT:</label>
                            <input type="text" class="form-control" id="" value="{{$config->script ?? ''}}" name="script" required />
                        </div>
                    </div>
                    <br>
                    
        
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                
                </form>
            </div>
        </div>
    </div>
</div>

@endsection