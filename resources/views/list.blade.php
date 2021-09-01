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
    <div id="postModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="post_form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Data</h4>
                    </div>
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <span id="form_output"></span>
                        <div class="form-group">
                            <label>slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>title</label>
                            <input type="text" name="title" id="title" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>body</label>
                            <input type="text" name="body" id="body" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>excerpt</label>
                            <input type="text" name="excerpt" id="excerpt" class="form-control" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="post" id="post" value="" />
                        <input type="hidden" name="button_action" id="button_action" value="insert" />
                        <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
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
                        "</td><td style='margin-right:20px;'><a href='edit.blade.php'>edit</a>" +
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
        });
    </script>
</x-layout>
