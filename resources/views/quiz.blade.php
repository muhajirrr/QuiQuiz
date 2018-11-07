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
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col p-0">
            <div class="title">
                <h4>{{ $quiz->name }}<p style="margin-bottom: unset"><small>{{ $quiz->description }}</small></p></h4>
            </div>
            <div id="slidename" class="container pt-5">
                <div class="row">
                    <div class="col-6 offset-3">
                        <div class="question">Name</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 offset-3">
                        <input id="inputname" type="text" class="form-control" placeholder="Your Name" required>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-6 offset-3">
                        <button id="btnname" class="btn btn-outline-info">Attempt Quiz</button>
                    </div>
                </div>
            </div>
            <div class="quiz-container">
                <form action="resultquiz" method="post" id="formquiz">
                    <input type="hidden" name="id_quiz" value="{{ $quiz->id }}">
                    <input id="nameform" type="hidden" name="name">
                    <div id="quiz">
                    @foreach($questions as $question)
                        <div class="slide">
                            <div class="question">
                                {{ $question->question }}
                            </div>
                            <div class="answers">
                                <label><input type="radio" name="{{ $question->id }}" value="a"> {{ $question->a }}</label>
                                <label><input type="radio" name="{{ $question->id }}" value="b"> {{ $question->b }}</label>
                                @if($question->c) <label><input type="radio" name="{{ $question->id }}" value="c"> {{ $question->c }}</label> @endif
                                @if($question->d) <label><input type="radio" name="{{ $question->id }}" value="d"> {{ $question->d }}</label> @endif
                                @if($question->e) <label><input type="radio" name="{{ $question->id }}" value="e"> {{ $question->e }}</label> @endif
                            </div>
                        </div>
                    @endforeach
                    </div>
                </form>
            </div>
            <button id="previous" class="btn btn-outline-info" style="display: none;">Previous Question</button>
            <button id="next" class="btn btn-outline-info" style="display: none;">Next Question</button>
            <button id="submit" class="btn btn-outline-success" style="display: none;" onclick="$('#formquiz').submit()">Submit Quiz</button>
        </div>
    </div>
    <div class="row">
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
<script src="@asset('js/quiz.js')"></script>
</body>
</html>