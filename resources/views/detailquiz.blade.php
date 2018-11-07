@extends("template.master")

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">{{ $quiz->name }}</h4>
                        <p>{{ $quiz->description }}</p>
                    </div>
                    <div class="col">
                        <a href="{{ APP_URL }}" class="float-right btn btn-flat btn-info">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h3>List Soal</h3>

                            @if ($success = \lib\Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ $success }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @if ($error = \lib\Session::get('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $error }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <?php $count = 1?>
                            <hr>
                            @foreach($questions as $question)
                                <div class="row">
                                    <div class="col pl-4">
                                        {{ $count++ }}. {{ $question->question }} (answer: {{ $question->answer }})
                                        <p class="pl-4">a. {{ $question->a }}</p>
                                        <p class="pl-4">b. {{ $question->b }}</p>
                                        <p class="pl-4">@if($question->c)c. {{ $question->c }}@endif</p>
                                        <p class="pl-4">@if($question->d)d. {{ $question->d }}@endif</p>
                                        <p class="pl-4">@if($question->e)e. {{ $question->e }}@endif</p>
                                    </div>
                                    <div class="col-2">
                                        <button type="button" class="btn btn-warning btn-flat btn-block" data-toggle="modal" data-target="#editmodal{{ $question->id }}">Edit</button>
                                        <button class="btn btn-danger btn-block btn-flat" onclick="if (confirm('Are you sure?')) document.getElementById('formdeletequestion{{ $question->id }}').submit()">Delete</button>
                                        <form id="formdeletequestion{{ $question->id }}" action="deletequestion" method="post">
                                            <input type="hidden" name="id_question" value="{{ $question->id }}">
                                        </form>
                                        <div class="modal fade" id="editmodal{{ $question->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit question</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="updatequestion" method="post">
                                                        <input type="hidden" value="{{ \lib\Input::get('id') }}" name="id_quiz">
                                                        <input type="hidden" value="{{ $question->id }}" name="id_question">
                                                        <div class="modal-body">
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">New Question</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" name="question" placeholder="New Question" value="{{ $question->question }}" required autocomplete="false">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Answer A</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" name="a" placeholder="Answer A" value="{{ $question->a }}" required autocomplete="false">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Answer B</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" name="b" placeholder="Answer B" value="{{ $question->b }}" required autocomplete="false">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Answer C</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" name="c" placeholder="Answer C" value="{{ $question->c }}" autocomplete="false">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Answer D</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" name="d" placeholder="Answer D" value="{{ $question->d }}" autocomplete="false">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Answer E</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" name="e" placeholder="Answer E" value="{{ $question->e }}" autocomplete="false">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Correct Answer</label>
                                                                <div class="col-sm-8">
                                                                    <select name="answer" class="form-control">
                                                                        <option value="a" @if($question->answer == 'a') selected @endif>A</option>
                                                                        <option value="b" @if($question->answer == 'b') selected @endif>B</option>
                                                                        <option value="c" @if($question->answer == 'c') selected @endif>C</option>
                                                                        <option value="d" @if($question->answer == 'd') selected @endif>D</option>
                                                                        <option value="e" @if($question->answer == 'e') selected @endif>E</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success btn-flat">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                            <form action="question" method="POST">
                                <input type="hidden" value="{{ \lib\Input::get('id') }}" name="id_quiz">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">New Question</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="question" placeholder="New Question" required autocomplete="false">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Answer A</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="a" placeholder="Answer A" required autocomplete="false">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Answer B</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="b" placeholder="Answer B" required autocomplete="false">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Answer C</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="c" placeholder="Answer C" autocomplete="false">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Answer D</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="d" placeholder="Answer D" autocomplete="false">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Answer E</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="e" placeholder="Answer E" autocomplete="false">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Correct Answer</label>
                                            <div class="col-sm-10">
                                                <select name="answer" class="form-control">
                                                    <option value="a">A</option>
                                                    <option value="b">B</option>
                                                    <option value="c">C</option>
                                                    <option value="d">D</option>
                                                    <option value="e">E</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-warning btn-flat btn-block">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h3>List Results</h3>
                            <hr>
                            <table id="mtable" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Score</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($results as $result)
                                    <tr>
                                        <td>{{ $result->name }}</td>
                                        <td>{{ $result->score }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function () {
            $('#mtable').DataTable();
        });
    </script>
@endsection