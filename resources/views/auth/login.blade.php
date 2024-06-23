<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            Login
        </title>
        <meta name="description" content="Login">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
        <link rel="stylesheet" media="screen, print" href="{{url('/assets/css/vendors.bundle.css')}}">
        <link rel="stylesheet" media="screen, print" href="{{url('/assets/css/app.bundle.css')}}">
        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
        <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <!-- Optional: page related CSS-->
        <link rel="stylesheet" media="screen, print" href="{{url('/assets/css/page-login-alt.css')}}">
        <link rel="stylesheet" media="screen, print" href="{{url('/assets/css/notifications/toastr/toastr.css')}}">
    </head>
    <body>
        <div class="blankpage-form-field">
            <div class="page-logo m-0 w-100 align-items-center justify-content-center rounded border-bottom-left-radius-0 border-bottom-right-radius-0 px-4">
                <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                    <img src="{{url($setting->logo)}}" alt="{{$setting->name}}" aria-roledescription="logo">
                    <span class="page-logo-text mr-1">{{$setting->name ?? ''}}</span>
                </a>
            </div>
            <div class="card p-4 border-top-left-radius-0 border-top-right-radius-0">
                <form method="post" action="{{('/authenticate')}}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="username">Username</label>
                        <input type="email" id="username" name="email" class="form-control" placeholder="your id or email" value="admin@admin.com">
                        @error('email')
                        <span class="help-block text-danger">
                        Please Enter Email
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="password" value="123456789">
                        @error('password')
                        <span class="help-block text-danger">
                        Please Enter Password
                        </span>
                        @enderror
                    </div>
                   {{-- <div class="form-group text-left">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="rememberme">
                            <label class="custom-control-label" for="rememberme"> Remember me for the next 30 days</label>
                        </div>
                    </div> --}}
                    <button type="submit" class="btn btn-default float-right">Secure login</button>
                </form>
            </div>
            <div class="blankpage-footer text-center">
                <a href="#"><strong>Recover Password</strong></a> | <a href="#"><strong>Register Account</strong></a>
            </div>
        </div>
        {{--<div class="login-footer p-2">
            <div class="row">
                <div class="col col-sm-12 text-center">
                    <i><strong>System Message:</strong> You were logged out from 198.164.246.1 on Saturday, March, 2017 at 10.56AM</i>
                </div>
            </div>
        </div>
        <video poster="/assets/img/backgrounds/clouds.png" id="bgvid" playsinline autoplay muted loop>
            <source src="/assets/media/video/cc.webm" type="video/webm">
            <source src="/assets/media/video/cc.mp4" type="video/mp4">
        </video>--}}
       
        <script src="{{url('/assets/js/vendors.bundle.js')}}"></script>
        <script src="{{url('/assets/js/app.bundle.js')}}"></script>
        <script src="{{url('/assets/js/notifications/toastr/toastr.js')}}"></script>
        <!-- Page related scripts -->
        @include('scripts.toastr')
    </body>
</html>
