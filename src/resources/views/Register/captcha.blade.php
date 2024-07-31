@extends('layouts.default')
@section('content')
    <script>
        function onSubmit(token) {
            alert('thanks ' + document.getElementById('field').value);
        }

        function validate(event) {
            event.preventDefault();
            grecaptcha.execute();
            if (!document.getElementById('field').value) {
                alert("You must add text to the required field");
            } else {
                grecaptcha.execute();
            }
        }

        function onload() {
            var element = document.getElementById('submit');
            element.onclick = validate;
        }
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <section class="vh-100" style="background-color: #f4f4f4;">
        <div class="container h-50">
            <div class="row d-flex justify-content-center align-items-center h-50">
                <div class="col-xl-4">

                    <form method="post" action="{{ route('captcha') }}" accept-charset="UTF-8">

                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        <div class="card" style="border-radius: 15px;">
                            <h3 class="mb-4 text-center">Step 3 - CAPTCHA</h3>
                            <p class="p-3 mb-4 text-center">Bypass this captcha to complete the Challenge.</p>
                            <div class="card-body">

                                <div class="row m-1 mt-3">
                                    <div class="col-md-12">

                                        <div id="recaptcha" class="g-recaptcha"
                                             data-sitekey="{{config('services.recaptcha_v3.siteKey')}}"
                                             data-callback="onSubmit"
                                             data-size="invisible"></div>
                                        {{--                                    <div class="g-recaptcha mt-4 col-md-12" data-sitekey={{config('services.recaptcha_v3.siteKey')}}></div>--}}
                                        {{--                                    <div id="recaptcha" class="g-recaptcha"--}}
                                        {{--                                         data-sitekey="{{config('services.recaptcha_v3.siteKey')}}"--}}
                                        {{--                                         data-callback="onSubmit"--}}
                                        {{--                                         data-size="invisible"></div>--}}
                                    </div>
                                </div>

                                <div class="row m-1 mt-3">
                                    <div class="col-md-12">
                                        <button type="submit" id="submit" class="btn btn-success btn-lg col-md-12">Complete
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
    {{--@include('scripts.logic')--}}

    <script>onload();</script>
@stop
