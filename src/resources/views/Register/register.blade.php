@extends('layouts.default')
@section('content')

<section class="vh-100" style="background-color: #f4f4f4;">
    <div class="container h-50">
        <div class="row d-flex justify-content-center align-items-center h-50">
            <div class="col-xl-4">

                <form method="post" id="registerform" action="{{ route('registered') }}" accept-charset="UTF-8">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    <div class="card" style="border-radius: 15px;">
                        <h3 class="mb-4 text-center">Step 1 - Register</h3>
                        <div class="card-body">

                            <div class="row align-items-center m-1">
                                <div class="col-md-12">
                                    <label for="name">Name:</label>
                                    <input type="text" onkeyup="myfunction()" id="name" name="name" class="form-control form-control-lg"/>

                                </div>
                            </div>
                            <div class="row align-items-center  m-1">
                                <div class="col-md-12">
                                    <label for="email">Email:</label>
                                    <input type="email" onkeyup="myfunction()" id="email" name="email" class="form-control form-control-lg"/>

                                </div>
                            </div>
                            <div class="row align-items-center  m-1">
                                <div class="col-md-12">
                                    <label for="password">Password:</label>

                                    <input type="password" onkeyup="myfunction()" id="password" name="password"
                                           class="form-control form-control-lg"/>

                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@include("scripts.registerlogic")
@stop
