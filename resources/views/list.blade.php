<x-layout>
    <table class="table table-bordered table-sm" style="width=100%; cellspacing=0; cellpadding=2; border=2;">

        <thead>
            <tr>
                <th>No</th>
                <th>user id</th>
                <th>category id</th>
                <th>Slug</th>
                <th>title</th>
                <th>Body</th>
                <th width="280px">excerpt</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="bodyData">

        </tbody>
    </table>
    <div class="modal fade" id="post-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="postModal"></h4>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="postForm" name="postForm" class="form-horizontal" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="slug" class="col-sm-2 control-label">Slug</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter slug"
                                    maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category_id" class="col-sm-2 control-label">category id</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" id="category_id" name="category_id"
                                    placeholder="Enter category" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user_id" class="col-sm-2 control-label">user id</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" id="user_id" name="user_id"
                                    placeholder="Enter user_id" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">title</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Enter title" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">body</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" id="body" name="body" placeholder="Enter body"
                                    required=""></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">excerpt</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" id="excerpt" name="excerpt" placeholder="Enter excerpt"
                                    required=""></textarea>
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="btn-save">Save changes
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "/list",
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}'
                },
                cache: false,
                dataType: 'json',
                success: function(dataResult) {
                    console.log(dataResult);
                    var resultData = dataResult;
                    var bodyData = '';
                    var i = 1;
                    $.each(resultData, function(index, row) {
                        bodyData += "<tr>"
                        bodyData += "<td>" + row.id + "</td><td>" + row.user_id +
                            "</td><td>" + row.category_id + "</td><td>" + row.slug + "</td>" +
                            "<td>" + row.title + "</td><td>" + row.body + "</td><td>" + row
                            .excerpt +
                            "</td><td style='margin-right:20px;'><button class='edit' data-id='" +
                            row.id +
                            "' >edit</button>" +
                            "<button class='deleteRecord' data-id='" + row.id +
                            "' >Delete</button></td>";
                        bodyData += "</tr>";

                    })
                    $("#bodyData").append(bodyData);
                }
            });
            $('body').on('click', '.deleteRecord', function() {
                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                    url: "list/" + id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        alert('deleted');
                        location.reload();
                    }
                });

            });
            $('body').on('click', '.edit', function() {
                var id = $(this).data("id");
                $.ajax({
                    type: "POST",
                    url: "{{ url('edit-post') }}",
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#postModal').html("Edit post");
                        $('#id').val(response.id);
                        $('#category_id').val(response.category_id);
                        $('#user_id').val(response.user_id);
                        $('#slug').val(response.slug);
                        $('#title').val(response.title);
                        $('#body').val(response.body);
                        $('#excerpt').val(response.excerpt);
                    }
                });
            });
            $('#postForm').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: "{{ url('list') }}",
                    data: formData,
                    _token: '{{ csrf_token() }}',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $("#post-modal").modal('hide');
                        var oTable = $('#ajax-crud-datatable').dataTable();
                        oTable.fnDraw(false);
                        $("#btn-save").html('Submit');
                        $("#btn-save").attr("disabled", false);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
        });
    </script>
</x-layout>
