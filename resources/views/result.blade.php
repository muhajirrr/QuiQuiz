<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ APP_NAME }}</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="@asset('css/style.css')">
    <link rel="stylesheet" href="@asset('css/quiz.css')">
    <style>
        .score {
            font-size: 36px;
            border: 1px solid black;
            border-radius: 50%;
            width: 120px;
            height: 120px;
            align-items: center;
            justify-content: center;
            display: flex;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col p-0">
            <div class="title">
                <h4>{{ $quiz->name }}<p style="margin-bottom: unset"><small>{{ $quiz->description }}</small></p></h4>
            </div>
            <div class="container pt-5">
                <div class="row">
                    <div class="col-6 offset-3">
                        <h2>{{ $name }}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 offset-3">
                        Your score
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-auto m-auto">
                        <div class="score">{{ $score }}<small><small>/{{ $numberOfQuestion }}</small></small></div>
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <div class="col">on {{ $quiz->name }}</div>
                </div>
                <div class="row text-center mt-4">
                    <div class="col">
                        <a href="{{ APP_URL.'/'.$quiz->url }}" class="btn btn-outline-info">Re-attempt Quiz</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col text-center footer">
            <a href="{{ APP_URL }}">&copy; {{ APP_NAME }} 2018</a>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>