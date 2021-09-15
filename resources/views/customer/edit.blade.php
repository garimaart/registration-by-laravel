<x-layout>
    <section>
        <main>
            <div>
              <h1>  Customer</h1>
                <button style="margin:10px;" class="btn btn-info edit-modal">reset password</button> 
                <button style="margin:10px;" class="btn btn-info add-modal"> Add note</button>
                <button style="margin:10px;" class="btn btn-info delete-modal"> Delete</button>

                <label>site id</label>
                <input class="site_id" id="site_id" >
                <label>first_name</label>
                <input class="first_name" id="first_name">
                <label>last name</label>
                <input class="last_name" id="lst_name">
                <label>phone</label>
                <input class="phone" id="phone">
                <label>email</label>
                <input class="email" id="email">

            </div>
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
            <script>
                jQuery('#delete').click(function () {
        var link_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: '/edit',
            success: function (data) {
                console.log(data);
                $("#link" + link_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});

            </script>
        </main>
    </section>
</x-layout>