<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{URL::to('loginTemplate/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{URL::to('loginTemplate/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{URL::to('loginTemplate/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{URL::to('loginTemplate/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{URL::to('loginTemplate/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{URL::to('loginTemplate/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('loginTemplate/css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{URL::to('loginTemplate/images/img-01.png')}}" alt="IMG">
            </div>

            <form class="login100-form validate-form" method="post" action="{{route('post.login')}}">
					<span class="login100-form-title">
						Member Login
					</span>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                </div>


                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="pass" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Login
                    </button>
                </div>

                <div class="text-center p-t-12">
                    <label for="remember" class="txt2">
                        <input class="validate-input" type="checkbox" name="remember" value=1 id="remember"> <span>Remember me</span>
                    </label>
                </div>
                <div class="text-center p-t-12">
						<span class="txt1">
							please login to continue
						</span>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="{{route('welcome')}}">
                        Go to Dashboard
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
                @if(Session('info'))
                    <div class="alert alert-danger text-center" style="position: fixed; bottom: 100px; right: 0; left: 0;" role="alert">
                        <span>{{Session('info')}}</span>
                    </div>
                @endif
                {{csrf_field()}}
            </form>
        </div>
    </div>
</div>




<!--===============================================================================================-->
<script src="{{URL::to('loginTemplate/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{URL::to('loginTemplate/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{URL::to('loginTemplate/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{URL::to('loginTemplate/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{URL::to('loginTemplate/vendor/tilt/tilt.jquery.min.js')}}"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    });
    $('.alert').fadeOut(3000,function () {
        {{Session::forget('info')}}
    })
</script>
<!--===============================================================================================-->
<script src="{{URL::to('loginTemplate/js/main.js')}}"></script>

</body>
</html>

