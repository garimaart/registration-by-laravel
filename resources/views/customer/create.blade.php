<x-layout>
    <section class="px-6 py-8">
        <main >
            <h1 class=" font-bold txt-ml">Customer</h1>
            <br>
            <h1>credentials</h1>

            <div class="form-group mb-6">
                <input type="hidden" name="_token" id="csrf" value="{{ Session::token() }}">
                <label for="email">site id:</label>
                <input type="text" class="form-control" id="site_id" placeholder="Enter site id" name="site_id"><br>
                <label id="siteerror" style="color:red;"></label>
            </div>
            <div class="form-group mb-6">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email1" placeholder="Enter Email" name="email"><br>
                <label id="emailerror" style="color:red;"></label>
            </div>
            <div class="form-group">
                <label for="email">password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password"
                    name="password"><br>
                <label id="passworderror" style="color:red;"></label>
            </div><br>
            <div class="form-group">
                <label for="email">confirm  password:</label>
                <input type="password" class="form-control" id="cpassword" placeholder="Enter confirm password"
                    name="password"><br>
                <label id="passworderror" style="color:red;"></label>
            </div><br>
            <h1>customer details</h1><br>
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
                <label id="lastnamerror" style="color:red;"></label>
            </div>
            <div class="form-group mb-6">
                <label for="email">Phone:</label>
                <input type="number" class="form-control" id="phone" placeholder="Enter phone number"
                    name="phone_no"><br>
                <label id="phoneerror" style="color:red;"></label>
            </div>
            <table>
                <tr>
                    <th>shipping address</th>
                    <th>billing address</th>
                </tr>
                <tr>
                    <td>
                        <label>company</label>
                        <input type="text" id="company" placeholder="enter company">
                    </td>
                    <td>
                        <label>company</label>
                        <input type="text" id="company" placeholder="company">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>location</label>
                        <input type="text" id="location" placeholder="enter location">
                    </td>
                    <td>
                        <label>location</label>
                        <input type="text" id="location" placeholder="enter location">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Address line 1</label>
                        <input type="text" id="address line1" placeholder="enter address line 1">
                    </td>
                    <td>
                        <label>Address line 1</label>
                        <input type="text" id="address line 1" placeholder="enter address line 1">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Address line2</label>
                        <input type="text" id="address line 2" placeholder="enter address line 2">
                    </td>
                    <td>
                        <label>Address line2</label>
                        <input type="text" id="address line 2" placeholder="enter address line 2">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>country</label>
                        <input type="text" id="country" placeholder="enter country">
                    </td>
                    <td>
                        <label>country</label>
                        <input type="text" id="country" placeholder="enter country">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>state</label>
                        <input type="text" id="state" placeholder="enter state">
                    </td>
                    <td>
                        <label>state</label>
                        <input type="text" id="state" placeholder="enter state">
                    </td>
                </tr>

            </table>
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
                        var cpassword=$('#cpassword').val();
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
                                }if (err.errors.last_name != "") {
                                    document.getElementById("lastnamerror").innerHTML = err.errors.last_name;
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
