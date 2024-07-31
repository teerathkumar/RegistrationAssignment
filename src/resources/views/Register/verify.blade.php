@extends('layouts.default')
@section('content')
    <script>
        function onSubmit(token) {
            // alert('thanks ' + document.getElementById('otp').value);
            document.getElementById("verifyform").submit();
        }

        function validate(event) {
            event.preventDefault();
            if (!document.getElementById('otp').value) {
                alert("You must add code to the required field");
            } else {
                grecaptcha.execute();
            }
        }

        function onload() {
            var element = document.getElementById('otp_btn');
            element.onclick = validate;
        }
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<section class="vh-100" style="background-color: #f4f4f4;">
    <div class="container h-50">
        <div class="row d-flex justify-content-center align-items-center h-50">
            <div class="col-xl-4">

                <form method="post" id="verifyform" action="{{ route('verify') }}" accept-charset="UTF-8">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    <div class="card" style="border-radius: 15px;">
                        <h3 class="mb-4 text-center">Step 2 - Verify Email</h3>
                        <h3 class="mb-4 text-center" id="counter"></h3>
                        <p class="p-3 mb-4 text-center">A verification code has been sent to your email - {{ $email }}.</p>
                        <div class="card-body">
                            <div id="recaptcha" class="g-recaptcha"
                                 data-sitekey="{{config('services.recaptcha_v3.siteKey')}}"
                                 data-callback="onSubmit"
                                 data-size="invisible"></div>
                            <div class="row align-items-center  m-1">
                                <div class="col-md-12">
                                    <label for="otp">Verification Code:</label>

                                    <input type="text" id="otp" name="otp" class="form-control form-control-lg"/>

                                    <input type="hidden" id="otp_verify" name="otp_verify" value="{{ $otp }}" />
                                    <input type="hidden" name="email" value="{{ $email }}" />
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
