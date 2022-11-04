@extends('Common.app')
<!-- Content Wrapper. Contains page content -->

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">

            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($errors->any())
        <h4 class="error-msg">{{ $errors->first() }}</h4>
    @endif
    <div class="content-wrapper" style="min-height: 1244.06px;">
        <!--//Page Toolbar//-->
        <div class="toolbar p-4 pb-0">
            <div class="position-relative container-fluid px-0">
                <div class="row align-items-center position-relative">
                    <div class="col-md-8 mb-4 mb-md-0">
                        <h3 class="mb-2">Subject</h3>


                    </div>
                    <div class="card-tools">
                        <button class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle"
                            style="float: right">Add Subject</button>

                    </div>
                </div>
            </div>
        </div>
        <!--//Page Toolbar End//-->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="content p-4 d-flex flex-column-fluid">

                    <div class="container-fluid px-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="table-responsive">
                                        <table id="datatable" class="table mt-0 table-striped table-card table-nowrap">
                                            <thead class="text-uppercase small text-muted">
                                                <tr>
                                                     <th>Category</th>
                                                    <th>Standard</th>
                                                    <th>Board </th>
                                                    <th>Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($subjects as $subject)
                                                    <tr>
                                                       <td>
                                                            {{ $subject->courseType->name }}
                                                        </td>
                                                        <td>
                                                            {{ $subject->classCategory->name }}
                                                        </td>
                                                        <td>
                                                            {{ $subject->classCategory->board_name }}
                                                        </td>
                                                        <td>{{ @$subject->name }}</td>

                                                          <td> <a class="js-edit-logo" data-bs-toggle="modal"
                                                                href="#editModal" style="cursor:pointer"
                                                                title="edit subject" data-id="{{ @$subject->id }}"
                                                                data-courseType = "{{ $subject->courseType->name }}"
                                                                data-standard_name = " {{ $subject->classCategory->name }}"
                                                                data-board_name="{{ $subject->classCategory->board_name }}"
                                                                data-name="{{ $subject->name }}"><i
                                                                    class="fa fa-edit"></i></a>
                                                            <a class="delete-material"
                                                                href="{{ route('delete.subject', @$subject->id) }}"
                                                                title="delete standard"
                                                                onClick="return  confirm('Are you sure you want to delete ?')"><i
                                                                    class="fa fa-trash-alt"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach



                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>

            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
                tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel">Add Subject
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.add.subject') }}" method="post" enctype="multipart/form-data">

                            @csrf
                            <div class="modal-body">
                                <div class="card-body">

                                    <label for="maskPhone" class="form-label">Category</label>
                                    <select class="form-control mb-2 js-change-category" name="course_id"  required>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }} </option>
                                        @endforeach
                                    </select>

                                    <label for="maskPhone" class="form-label">Standard</label>
                                    <select class="form-control mb-2 js-change-standard" name="standard_id"  required>

                                    </select>
                                    <label for="maskPhone" class="form-label">Board</label>
                                    <select class="form-control mb-2 js-change-board" name="board_name" required>

                                    </select>


                                    <label for="maskPhone" class="form-label">Name</label>
                                    <input class="form-control mb-2" type="text" placeholder="name" name="name"
                                        required>



                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <div class="modal fade" id="editModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
                tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel">Edit Subject
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.update.subject') }}" method="post"
                            enctype="multipart/form-data">

                            @csrf
                            <input type="hidden" name="id" id="subject_id">
                            <div class="modal-body">

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="email-1">Category</label>
                                        <select name="course_id" id="course_id" class="form-control js-change-category" required>
                                            <option>Select Category</option>
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}">
                                                    {{ $course->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="email-1">Standard</label>
                                        <select name="standard_id" id="standard_id" class="form-control js-change-standard" required>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="email-1">Board</label>
                                        <select name="board" id="board_id" class="form-control js-change-board" required>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="email-1">Name</label>
                                        <input type="text" id="name" class="form-control"
                                             name="name" value="{{ old('name') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



        </section>
        <!-- /.content -->
    </div>
    <script src="{{ asset('../login/plugins/jquery/jquery.min.js') }}"></script>

    <script>
        $(".js-edit-logo").on('click', function(e) {
            var id = $(this).attr('data-id');
            var courseType = $(this).attr('data-courseType');
            var classCategory_name = $(this).attr('data-standard_name');
            var board_name = $(this).attr('data-board_name');
            var name = $(this).attr('name');
            getStandard(course_id);
            getboard(standard_id);



            $("#editModal .modal-dialog #subject_id").val(id);
            $('#editModal .modal-dialog #course_id option[value="' + courseType + '"]').attr("selected",
                "selected");
            $('#editModal .modal-dialog #standard_id option[value="' + classCategory_name + '"]').attr("selected",
                "selected");
            $('#editModal .modal-dialog #board option[value="' + board_name + '"]').attr("selected",
                "selected");
             $("#editModal .modal-dialog #name").val(name);


        });
    </script>

    <script>
        $('.js-change-category').on('change', function() {
            var that = $(this).val();
            getStandard(that);

        });
        $('.js-change-standard').on('change', function() {
            var that = $(this).val();
            getboard(that);

        });


        function getStandard(course_id) {
            var id = course_id;
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{!! route('course.standard') !!}', //the page containing php script
                type: "post", //request type,
                data: {
                    id: id,
                    _token: _token
                },
                success: function(result) {
                    $('.js-change-standard').html('');
                    $('.js-change-standard').html(result.data);
                   console.log(result.data);
                }
            });

        }

        function getboard(standard_id) {
            var id = standard_id;
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{!! route('standard.board') !!}', //the page containing php script
                type: "post", //request type,
                data: {
                    id: id,
                    _token: _token
                },
                success: function(result) {
                    $('.js-change-board').html('');
                    $('.js-change-board').html(result.data);
                   console.log(result.data);
                }
            });

        }
    </script>

    <script>
        $(".allow_numeric").on("input", function(evt) {
            var self = $(this);
            self.val(self.val().replace(/\D/g, ""));
            if ((evt.which < 48 || evt.which > 57)) {
                evt.preventDefault();
            }
        });
    </script>
@endsection
