@extends('layouts.app')

@section('links')
    <style>
        .mn-container{
            height: 35vh;
            text-align: center;
            border: 1px solid #ccc;
        }
        .mn-container .btn{
            align-content: center;
            font-size: 27px;
            text-transform: uppercase;
            font-weight: 500;
            color: white;
        }
        .mn-container img{
            width: 55px;
            margin-right: 35px;
        }
    </style>
@endsection
    
@section('content')
<div class="az-content-body pd-lg-l-40 d-flex flex-column">
    <div class="container">
        <div class="az-content-body">
            <div class="az-dashboard-one-title">
                <div>
                    <h2 class="az-dashboard-title">Hi, {{auth()->user()->name}} !</h2>
                </div>
                <div class="az-content-header-right">
                    <div class="media">
                        <div class="media-body">
                            <label>System</label>
                            <h6>Offline</h6>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-body">
                            <label>Version</label>
                            <h6>1.0.0</h6>
                        </div>
                    </div>

                    
                </div>
            </div>
            <hr>
            <div class="row row-sm mg-b-20">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row mn-container">
                            <a href="{{route('portal.readings')}}" class="btn btn-primary">
                                <img src="/icons/003-dashboard.png" alt="">
                                My Readings
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row mn-container">
                            <a href="{{route('portal.capture.data')}}" class="btn btn-info">
                                <img src="/icons/002-data-collection-1.png" alt="">
                                Capture new data
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row mn-container">
                            <a href="{{route('portal.scale.reading')}}" class="btn btn-info">
                                <img src="/icons/007-weight-scale.png" alt="">
                                Scale Readings
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row mn-container">
                            <a href="{{route('portal.configurations')}}" class="btn btn-primary">
                                <img src="/icons/010-configuration.png" alt="">
                                Configurations
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection