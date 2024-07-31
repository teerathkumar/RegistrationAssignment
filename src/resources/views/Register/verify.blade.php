@extends('layouts.default')
@section('content')
<section class="vh-100" style="background-color: #f4f4f4;">
    <div class="container h-50">
        <div class="row d-flex justify-content-center align-items-center h-50">
            <div class="col-xl-4">

                <form method="post" action="{{ route('verify') }}" accept-charset="UTF-8">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    <div class="card" style="border-radius: 15px;">
                        <h3 class="mb-4 text-center">Step 2 - Verify Email</h3>
                        <p class="p-3 mb-4 text-center">A verification code has been sent to your email - {{ $email }}.</p>
                        <div class="card-body">

                            <div class="row align-items-center  m-1">
                                <div class="col-md-12">
                                    <label for="otp">Verification Code:</label>

                                    <input type="text" id="otp" name="otp" class="form-control form-control-lg"/>

                                    <input type="hidden" id="otp_verify" name="otp_verify" value="{{ $otp }}" class="form-control form-control-lg"/>
                                </div>
                            </div>

                            <div class="row m-1 mt-3">
                                <div class="col-md-12">
                                    <button type="submit" id="otp_btn" disabled class="btn btn-success btn-lg col-md-12">Verify
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@include('scripts.logic')
@stop
