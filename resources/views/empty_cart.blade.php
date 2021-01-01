@extends('layouts.app')
@section('content')

    <section>
        <div class="container-alt">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="home-wrapper">
                        <h1 class="icon-main text-danger"><i class="md md-error"></i></h1>
                        <h1 class="home-text text-uppercase">Your Cart is Empty!!!</h1>
                        <h4>Please Go Back to the Point of Sale & Fill Up the Cart Before Creating Invoice!!!</h4>
                        <div class="row maintenance-page">
                            <button type="button" class="btn btn-lg btn-danger"><a href="{{ route('pos') }}"
                                    class="text-white">Click Here to Go Back to the Point of Sale</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
