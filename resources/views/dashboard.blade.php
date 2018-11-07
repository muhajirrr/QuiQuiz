@extends('template.master')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <div class="container">
        <div class="row pb-3">
            <div class="col-sm-6">
                <h5 class="m-0 text-dark">Quiz Lists</h5>
            </div>
            <div class="col">
                <button type="button" class="btn btn-warning float-right btn-flat btn-sm" data-toggle="modal" data-target="#newquizmodal">New Quiz</button>

                <div class="modal fade" id="newquizmodal" tabindex="-1" role="dialog" aria-labelledby="newquizmodallabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="newquizmodallabel">New Quiz</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="quiz" method="POST">
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="inputname" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputname" placeholder="Name" name="name" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputdesc" class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="inputdesc" rows="5" placeholder="Description" name="desc"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputurl" class="col-sm-2 col-form-label">URL</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputurl" placeholder="URL" name="url" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary btn-flat">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col table-responsive">
                <table id="mtable" class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>URL</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($quizzes as $quiz)
                        <tr>
                            <td>{{ $quiz->name }}</td>
                            <td>{{ $quiz->description }}</td>
                            <td><a href="{{ APP_URL.'/'.$quiz->url }}" target="_blank">{{ APP_URL.'/'.$quiz->url }} <i class="fa fa-external-link"></i></a></td>
                            <td>
                                <a href="quiz?id={{ $quiz->id }}" class="btn btn-info btn-sm btn-flat">Detail</a>
                                <button type="button" class="btn btn-warning btn-flat btn-sm" data-toggle="modal" data-target="#editmodal{{ $quiz->id }}">Edit</button>
                                <button class="btn btn-danger btn-sm btn-flat" onclick="if(confirm('Are you sure?')) document.getElementById('formdelete{{ $quiz->id }}').submit()">Delete</button>
                                <form action="deletequiz" method="POST" id="formdelete{{ $quiz->id }}">
                                    <input type="hidden" name="id_quiz" value="{{ $quiz->id }}">
                                </form>
                                <div class="modal fade" id="editmodal{{ $quiz->id }}" tabindex="-1" role="dialog" aria-labelledby="newquizmodallabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="newquizmodallabel">New Quiz</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="updatequiz" method="POST">
                                                <input type="hidden" name="id_quiz" value="{{ $quiz->id }}">
                                                <div class="modal-body">
                                                    <div class="form-group row">
                                                        <label for="inputname" class="col-sm-2 col-form-label">Name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputname" placeholder="Name" value="{{ $quiz->name }}" name="name" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputdesc" class="col-sm-2 col-form-label">Description</label>
                                                        <div class="col-sm-10">
                                                            <textarea class="form-control" id="inputdesc" rows="5" placeholder="Description" name="desc">{{ $quiz->description }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputurl" class="col-sm-2 col-form-label">URL</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputurl" placeholder="URL" name="url" value="{{ $quiz->url }}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary btn-flat">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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