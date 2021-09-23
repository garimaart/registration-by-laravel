<x-layout>
    <main>
        <section>
            <div>
                <table class="table table-inverse">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>last_name</th>
                            <th>first_name</th>
                            <th>phone</th>
                            <th>email</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody id="customer-list" name="customer-list">
                        @foreach ($customer as $data)
                            <tr id="customer{{ $data->id }}">
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->last_name }}</td>
                                <td>{{ $data->first_name }}</td>
                                <td>{{ $data->phone }}</td>
                                <td>{{ $data->email }}</td>
                                <td><button id="edit" class="edit">edit</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <script>
                    jQuery(document).ready(function($) {
                        $('#edit').click(function() {
                            window.location.href = '/edit';
                            $(document).on("click", "#apply", function() {
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });

                                $.ajax({
                                    type: "get",
                                    url: '/edit',
                                    success: function(store) {
                                        if (store == 'confirmed') {
                                            $("#formModal").toggleClass("open").show();
                                            $("body").toggleClass("open");
                                        }
                                    },

                                });

                            });

                        });

                        jQuery('#btn-add').click(function() {
                            jQuery('#btn-save').val("add");
                            jQuery('#myForm').trigger("reset");
                            jQuery('#formModal').modal('show');
                        });


                        $("#btn-save").click(function(e) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            e.preventDefault();
                            var formData = {
                                lastname: jQuery('#last_name').val(),
                                firstname: jQuery('#first_name').val(),
                                phone: jQuery('#phone').val(),
                                email: jQuery('#email').val(),
                            };
                            var state = jQuery('#btn-save').val();
                            var type = "POST";
                            var customer_id = jQuery('#customer_id').val();
                            var ajaxurl = 'customerlist';
                            $.ajax({
                                type: type,
                                url: ajaxurl,
                                data: formData,
                                dataType: 'json',
                                success: function(data) {
                                    var todo = '<tr id="customer' + data.id + '"><td>' + data.id +
                                        '</td><td>' +
                                        data.last_name + '</td><td>' + data.first_name + '</td><td>' +
                                        data.phone + '</td><td>' + data.email + '</td>';
                                    if (state == "add") {
                                        jQuery('#customer-list').append(todo);
                                    } else {
                                        jQuery("#customer" + todo_id).replaceWith(todo);
                                    }
                                    jQuery('#myForm').trigger("reset");
                                    jQuery('#formModal').modal('hide');
                                },
                                error: function(data) {
                                    console.log(data);
                                }
                            });
                        });
                    });
                </script>
        </section>
    </main>
</x-layout>
