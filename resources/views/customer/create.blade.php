<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-300 border border-gray-500 p-6 rounded-xl">
            <h1 class="text-center font-bold txt-ml">Customer</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group mb-6">
                <input type="hidden" name="_token" id="csrf" value="{{ Session::token() }}">
                <label for="email">site id:</label>
                <input type="text" class="form-control" id="site_id" placeholder="Enter site id" name="site_id"><br>
                <label id="siteerror" style="color:red;"></label>
            </div>
            <div class="form-group mb-6">
                <input type="hidden" name="_token" id="csrf" value="{{ Session::token() }}">
                <label for="email">first Name:</label>
                <input type="text" class="form-control" id="first_name" placeholder="Enter first Name"
                    name="first_name"><br>
                <label id="firstnameerror" style="color:red;"></label>
            </div>
            <div class="form-group mb-6">
                <input type="hidden" name="_token" id="csrf" value="{{ Session::token() }}">
                <label for="email">Last Name:</label>
                <input type="text" class="form-control" id="last_name" placeholder="Enter last Name"
                    name="last_name"><br>
                <label id="lastnameerror" style="color:red;"></label>
            </div>
            <div class="form-group mb-6">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email1" placeholder="Enter Email" name="email"><br>
                <label id="emailerror" style="color:red;"></label>
            </div>
            <div class="form-group mb-6">
                <label for="email">Phone:</label>
                <input type="number" class="form-control" id="phone" placeholder="Enter phone number"
                    name="phone_no"><br>
                <label id="phoneerror" style="color:red;"></label>
            </div>
            <div class="form-group">
                <label for="email">password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password"
                    name="password"><br>
                <label id="passworderror" style="color:red;"></label>
            </div>
            <button type="submit" class="btn btn-primary" id="butsave">Submit</button>
            </div>
            <script>
                $(document).ready(function() {

                    $('#butsave').on('click', function() {
                        var site_id = $('#site_id').val();
                        var first_name = $('#first_name').val();
                        var last_name = $('#last_name').val();
                        var email = $('#email').val();
                        var phone = $('#phone').val();
                        var password = $('#password').val();

                        $.ajax({
                            url: "/customer",
                            type: "POST",
                            data: {
                                _token: $("#csrf").val(),
                                type: 1,
                                site_id: site_id,
                                first_name: first_name,
                                last_name: last_name,
                                email: email,
                                phone: phone,
                                password: password,
                            },
                            cache: false,
                            success: function(dataResult) {
                                console.log(dataResult);
                            },
                            error: function(jqAjax, statusCode, errorThrown) {
                                var err = JSON.parse(jqAjax.responseText);
                                console.log(err);
                                if (err.errors.site_id != "") {
                                    document.getElementById("siteerror").innerHTML = err.errors.site_id;
                                }
                                if (err.errors.first_name != "") {
                                    document.getElementById("firstnameerror").innerHTML = err.errors.first_name;
                                }
                                if (err.errors.email != "") {
                                    document.getElementById("emailerror").innerHTML = err.errors.email;
                                }
                                if (err.errors.phone != "") {
                                    document.getElementById("phoneerror").innerHTML = err.errors.phone;
                                } else(err.errors.password != "")
                                document.getElementById("passworderror").innerHTML = err.errors.password;

                            }
                        });
                    });

                });
            </script>
        </main>
    </section>
</x-layout>
