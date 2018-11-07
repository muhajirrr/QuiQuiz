<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ APP_NAME }}</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="@asset('css/materialform.css')">
    <link rel="stylesheet" href="@asset('css/style.css')">
    <style>
        body {
            background-image: url(@asset('img/bg.jpg'));
            background-size: cover;
            background-position: 0 -90px;
        }

        .effect-overlay {
            background: rgba(0,0,0,0.7)
        }

        .mcard {
            background: rgba(0,0,0,0.8);
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row effect-overlay" style="height: 100vh; display: flex; align-items: center">
            <div class="col-10 col-md-4 offset-1 offset-md-4">
                <div class="mcard pt-4">
                    <h4 class="text-white px-5 pt-2 pb-2" style="border-left: 3px solid #17a2b8"><b>QuiQuiz</b></h4>
                    <div class="mcard-body px-5 px-md-5 pb-4">
                        <form id="loginform" action="login" method="post">
                            @if (\lib\Session::has('error')) <div class="text-danger">{{ \lib\Session::get('error') }}</div> @endif
                            <div class="material-form">
                                <input type="text" class="material-input" name="username" required autofocus autocomplete="off">
                                <label class="material-label">Username</label>
                            </div>
                            <div class="material-form">
                                <input type="password" class="material-input" name="password" required autocomplete="off">
                                <label class="material-label">Password</label>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <button type="submit" class="btn btn-info btn-block btn-flat">Login</button>
                                </div>
                            </div>
                            <div class="row pt-3">
                                <div class="col text-white-50 text-center">
                                    Not a member? <a href="" class="text-info" id="registerbtn">Register</a>
                                </div>
                            </div>
                        </form>

                        <form id="registerform" action="register" method="post"  style="display: none">
                            <div class="material-form">
                                <input type="text" class="material-input" name="name" required autofocus autocomplete="off">
                                <label class="material-label">Name</label>
                            </div>
                            <div class="material-form">
                                <input type="email" class="material-input" name="email" required autofocus autocomplete="off">
                                <label class="material-label">Email</label>
                            </div>
                            <div class="material-form">
                                <input type="text" class="material-input" name="username" required autofocus autocomplete="off">
                                <label class="material-label">Username</label>
                            </div>
                            <div class="material-form">
                                <input id="inputpassword" type="password" class="material-input" name="password" required>
                                <label class="material-label">Password</label>
                            </div>
                            <div class="material-form">
                                <input id="inputconfirm" type="password" class="material-input" name="password" required>
                                <label class="material-label">Confirm Password</label>
                            </div>
                            <div id="confirmerror" class="text-danger"></div>
                            <div class="row mt-4">
                                <div class="col">
                                    <button type="submit" id="registerbutton" class="btn btn-info btn-block btn-flat" disabled>Register</button>
                                </div>
                            </div>
                            <div class="row pt-3">
                                <div class="col text-white-50 text-center">
                                    Already a member? <a href="" class="text-info" id="loginbtn">Login</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="@asset('js/materialform.js')"></script>

<script>
    $(function () {
        $('#registerbtn').click(function(event) {
            event.preventDefault();
            $('#loginform').hide(300, function () {
                $('#registerform').show(300);
            });
        });

        $('#loginbtn').click(function(event) {
            event.preventDefault();
            $('#registerform').hide(300, function () {
                $('#loginform').show(300);
            });
        });

        $('#inputconfirm').keyup(function () {
            if($('#inputpassword').val() != $('#inputconfirm').val()) {
                $('#confirmerror').html("Doesn't match!");
            } else {
                $('#confirmerror').html("");
                $('#registerbutton').prop('disabled', false);
            }
        });
    });
</script>

</body>
</html>