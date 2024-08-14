@extends('layouts.app')
    
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
                            <label>Launch Date</label>
                            <h6>June 10, 2024</h6>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-body">
                            <label>End Date</label>
                            <h6>June 10, 2024</h6>
                        </div>
                    </div>

                    
                </div>
            </div>
            <hr>
            <div class="row row-sm mg-b-20">
                <div class="col-md-4">
                    <div class="card bg3">
                        <div class="card-body">
                            <a href="{{route('portal.scale.reading')}}"><p class="mg-b-0">Scale Readings</p></a>
                        </div>
                        <div class="card-footer bd-t">
                            -
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg3">
                        <div class="card-body">
                            <a href="{{route('portal.capture.data')}}"><p class="mg-b-0">Capture new data</p></a>
                        </div>
                        <div class="card-footer bd-t">
                            -
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg3">
                        <div class="card-body">
                            <a href="{{route('portal.readings')}}"><p class="mg-b-0">Reporting Tool</p></a>
                        </div>
                        <div class="card-footer bd-t">
                            -
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg3">
                        <div class="card-body">
                            <a href="{{route('portal.configurations')}}"><p class="mg-b-0">Configurations</p></a>
                        </div>
                        <div class="card-footer bd-t">
                            -
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg3">
                        <div class="card-body">
                            <a href="{{route('portal.users.index')}}"><p class="mg-b-0">User Setups</p></a>
                        </div>
                        <div class="card-footer bd-t">
                            -
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection