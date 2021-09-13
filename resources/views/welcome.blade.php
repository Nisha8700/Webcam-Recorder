@extends('layouts.app')

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <img src="black/img/vocso-logo.png" alt="logo" style="width:200px;height:50px;">
                        <br><br>
                        <h1 class="text-white">{{ __('Welcome to VOCSO Technologies!') }}</h1>
                        <h3 class="text-lead text-light">
                            {{-- {{ __('welcome to VOCSO Technologies.') }} --}}

                        </h3>
                        <p>we are the #1 creative design agency.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
