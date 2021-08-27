<x-layout>
    <table class="table table-bordered table-sm">

        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Username</th>
                <th>email</th>
                <th>created at</th>
                <th>updated at</th>
                <th width="200px">Action</th>
            </tr>
        </thead>
        <tbody id="bodyData">

        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "/listing",
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
                    $.each(resultData, function(index, row) {
                        bodyData += "<tr>"
                        bodyData += "<td>" + row.id++ + "</td><td>" + row.name + "</td><td>" +
                            row.username + "</td><td>" + row.email + "</td>" +
                            "<td>" + row.created_at + "</td><td>" + row.updated_at +
                            "</td><td style='margin-right:20px;'><a class='btn btn-primary' href='#'>Edit</a>" +
                            "<button class='btn btn-danger delete' value='" + row.id +
                            "' style='margin-left:20px;'>Delete</button></td>";
                        bodyData += "</tr>";

                    })
                    $("#bodyData").append(bodyData);
                }
            });

        });
    </script>
</x-layout>
