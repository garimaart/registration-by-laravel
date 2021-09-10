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

                <div class="modal fade" id="formModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="formModalLabel">Create customer</h4>
                            </div>
                            <div class="modal-body">
                                <form id="myForm" name="myForm" class="form-horizontal" novalidate="">

                                    <div class="form-group">
                                        <label>last name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                            placeholder="Enter title" value="">
                                    </div>

                                    <div class="form-group">
                                        <label>first Name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name"
                                            placeholder="first_name" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            placeholder="Enter phone" value="">
                                    </div>

                                    <div class="form-group">
                                        <label>email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="Enter email" value="">
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes
                                </button>
                                <input type="hidden" id="customer_id" name="customer_id" value="0">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            </div>
            <script>
                jQuery(document).ready(function($) {


                    jQuery('#btn-add').click(function() {
                        jQuery('#btn-save').val("add");
                        jQuery('#myForm').trigger("reset");
                        jQuery('#formModal').modal('show');
                    });

                    // CREATE
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
                            phone:jQuery('#phone').val(),
                            email:jQuery('#email').val(),
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
                                    data.last_name + '</td><td>' + data.first_name + '</td><td>'
                                    +data.phone+'</td><td>'+data.email+'</td>';
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
