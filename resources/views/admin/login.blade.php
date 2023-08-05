<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{url('assets/image/logo.png')}}" type="image/x-icon">
    <title>Login || medical </title>
    <style>
                html {
            font-family: monospace;
        }
        .main{
            padding: 17px;
        }
        .landrbutton {
            right: 70px;
            top: 11px;
        }

        .login_content {
            display: flex;
            justify-content: center;
            align-items: center;
            place-items: center;
        }

        .login_content form {
            margin-top: 117px;
            padding: 30px 60px;
            width: 500px;
        }

        .form-text {
            display: none;
        }

        @media only screen and (max-width: 600px) {
            .login_content form {

                padding: 30px 20px;

            }
            .header h3{
                text-align:start !important;
            }
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="header text-center w-100 position-relative  p-2 border">
            <h3 class="text-center">Medical Report Meker</h3>
        </div>
        <div class="container login_content">
            <form id="lform" action="{{url('/admin/login')}}" method="post" class="  border">
                @csrf
                <h5>Sign in</h5>      
                <div class="text-danger text-center h5">
                    {{session()->has('error') ? session()->get('error') : ""}}
                </div>
                <br>
               
                <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId"
                        placeholder="Enter your email" value="{{old('email')}}">
                        <span class="text-danger">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </span>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId"
                        placeholder="Enter your password"  value="{{old('password')}}">
                        <span class="text-danger">
                            @error('password')
                            {{ $message }}
                            @enderror
                        </span>
                </div>
                <button type="submit" class="btn btn-primary px-4 py-1">Sign in</button>
            </form>

        </div>


    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function () {

            // change user type
            $('#loginType').on("change",function(e){
                if(e.target.value == 1){
                    $('#lform').attr("action","{{url('/login_doctor')}}")
                }else if(e.target.value == 2){
                    $('#lform').attr("action","{{url('/login_hospital')}}")
                }
            })
        });
    </script>
</body>

</html>