@extends('layouts.app')

@section('scripts')
<script>
    setInterval(function() {
        Livewire.dispatch('weightTab')
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
            font-size: 370.05px;
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
            text-align: end;
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
            <div class="row center-screen">
                <div class="lg67">
                    <img src="/assets/images/logo.png" alt="" height="24" />
                </div>
                <h4>ALPHA SCALE</h4>
               @livewire('g-scale')
            </div>
        </div>
    </div>
</div>

@endsection