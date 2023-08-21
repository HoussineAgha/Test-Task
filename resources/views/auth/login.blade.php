@extends('layout.app')

@section('title','login page')

@section('style')
<style>

        .password-input {
        position: relative;
        }

        .password-input .toggle-password {
        position: absolute;
        top: 50%;
        left: 95%;
        transform: translateY(-50%);
        cursor: pointer;
        background-image: url("path/to/eye-icon.png"); /* استبدل برابط صورة الأيقونة الخاصة بك */
        background-size: contain;
        background-repeat: no-repeat;
        width: 20px;
        height: 20px;
        }


    </style>
@endsection

@section('content')
@include('flash::message')

<div class="container registration-form" style="">
    <div class="row" style="margin-top:50px; margin-bootom:50px;">
        <div class="col-3"></div>
        <div class="col-6">
            <h1 class="text-center"> Login </h1>
            <div class="d-grid gap-2 col-6 mx-auto" style="margin-bottom: 25px;margin-top:25px;">
                <a href="#" class="btn btn-primary" >
                    <i class="fa-brands fa-google"></i>
                    Google
                </a>
            </div>
                <form action="{{route('login.post')}}" method="POST">
                    @csrf
                    @include('shared.errorvalidate')
                        <div class="mb-3">
                                <label for="email" class="form-label"></label>
                                <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="email" value="{{ old('email') }}">
                                <span class="error-message" style="color:red;">
                                    {{ $errors->first('email') }}
                                </span>
                        </div>

                        <div class="mb-3">
                            <div class="password-input">
                                <input type="password" id="password" name="password" class="form-control" placeholder="password">
                                <span class="toggle-password">
                                    <i class="fas fa-eye" onclick="togglePasswordVisibility()"></i>
                                </span>
                            </div>
                            <span class="error-message" style="color:red;">
                                {{ $errors->first('password') }}
                            </span>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary"> login </button>
                </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>


@section('script')
<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password");
        var icon = document.querySelector(".toggle-password");

        if (passwordInput.type === "password") {
          passwordInput.type = "text";
          icon.style.backgroundImage = "url('path/to/eye-icon-off.png')"; /* استبدل برابط صورة الأيقونة الخاصة بإخفاء الرمز */
        } else {
          passwordInput.type = "password";
          icon.style.backgroundImage = "url('path/to/eye-icon.png')"; /* استبدل برابط صورة الأيقونة الخاصة بظهور الرمز */
        }
      }

    </script>
@endsection
@endsection
