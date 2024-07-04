@extends('layouts.app')

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <script defer src="https://pyscript.net/alpha/pyscript.js"></script>
<script>
    setInterval(function() {
        Livewire.emit('readWeight')
        Livewire.emit('weightTab')
    }, 1000);
</script>
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
                <h2>Weighing Ticket:</h2>
            </div>
            <div class="row">
                <form id="kepapp" action="{{route('portal.capture.data')}}" method="post">
                    @csrf
                    <div class="row">
                        <!-- Name Field -->
                        <div class="col-md">
                            <label for="name" class="form-label">Scale Readings(KG)</label>
                            @livewire('w-scale')
                        </div>
                        <div class="col-md">
                            <label for="otherNames" class="form-label">Account Name/ID:</label>
                            <input type="text" class="form-control" readonly aria-describedby="nameHelp" />
                        </div>
                        <div class="col-md">
                            <label for="lastName" class="form-label">Source Name/ID:</label>
                            <input type="text" class="form-control" id="" name="sourceName" required="" aria-describedby="nameHelp" />
                        </div>
                    </div>
                    <br>
                    <div class="row g-3 mb-3">
                        <div class="col-md">
                            <label for="lastName" class="form-label">Driver Name/ID:</label>
                            <input type="text" class="form-control" id="" name="driverName" required="" aria-describedby="nameHelp" />
                        </div>
                        <div class="col-md-4">
                            <label for="dob" class="form-label">Commodity Name/ID:</label>
                            <input type="text" class="form-control" name="commodityName" required="" />
                        </div>
                        <div class="col-md-4">
                            <label for="dob" class="form-label">Destination Name/ID:</label>
                            <input type="text" class="form-control" name="destinationName" required="" />
                        </div>
                
                        
                    </div>
        
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                    <div class="row g-3 mb-3  center-screen">
                        <div class="box lg67">
                            @livewire('g-scale')
                        </div>
                    </div>
                
                </form>
            </div>
        </div>
    </div>
</div>

@endsection