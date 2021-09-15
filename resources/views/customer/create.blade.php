<x-layout>
    <section class="px-6 py-8">
        <main>
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
                <label for="email">confirm password:</label>
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
                        <input type="text" id="company" class="company" placeholder="enter company">
                    </td>
                    <td>
                        <label>company</label>
                        <input type="text" id="company2" class="company" placeholder="company">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Address line 1</label>
                        <input type="text" id="address line 1" class="address line 1"
                            placeholder="enter address line 1">
                    </td>
                    <td>
                        <label>Address line 1</label>
                        <input type="text" id="address1" class="address line 1" placeholder="enter address line 1">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Address line2</label>
                        <input type="text" id="address line 2" class="address line 2"
                            placeholder="enter address line 2">
                    </td>
                    <td>
                        <label>Address line2</label>
                        <input type="text" id="address2" class="address line 2" placeholder="enter address line 2">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>country</label>
                        <input type="text" id="autocomplete" class="country" placeholder="enter country">
                    </td>
                    <td>
                        <label>country</label>
                        <input type="text" id="country1" class="country" placeholder="enter country">
                    </td>
                </tr>
                <tr>
                    <td id="latitudeArea">
                        <label>latitude</label>
                        <input type="text" id="latitude" class="latitude" placeholder="enter latitude">
                    </td>
                    <td id="longtitudeArea">
                        <label>longtitude</label>
                        <input type="text" id="longtitude" class="longtitude" placeholder="enter longtitude">
                    </td>
                </tr>

            </table>
            <div class="checkbox">
                <label><input type="checkbox" id="copy_address" name="copy_address"> Same as Billing Address</label>
            </div>
            <br>
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
                        var cpassword = $('#cpassword').val();
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
                                if (err.errors.last_name != "") {
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
                                document.getElementById("passworderror").innerHTML = err.errors
                                    .password;

                            }
                        });
                    });


                    $('#copy_address').click(function() {
                        if (this.checked) {
                            $("#company2").val($("#company").val());
                            $("#address1").val($("#address line 1").val());
                            $("#address2").val($("#address line 2").val());
                            $("#country1").val($("#country").val());
                            $("#state1").val($("#state").val());

                        } else {
                            $("#company2").val('');
                            $("#loction2").val('');
                            $("#address1").val('');
                            $("#address2").val('');
                            $("#country1").val('');
                            $("#state1").val('');
                        }

                    });
                    $('#butsave').on('click', function() {
                        var company = $('#company').val();
                        var company1=$('#company1').val();
                        var addressline1 = $('#address line 1').val();
                        var address1=$('#address').val();
                        var addressline2 = $('#address line 2').val();
                        var address2=$('#address2').val();
                        var country = $('#country').val();
                        var country1=$('#country1').val()
                        var state = $('#state').val();
                        var state=$('#state1').val();
                        $.ajax({
                            url: "/customer",
                            type: "POST",
                            data: {
                                _token: $("#csrf").val(),
                                type: 1,
                                company: company,
                                company1: company1,
                                addressline1:addressline1,
                                address1: address1,
                                addressline2:addressline2,
                                address2:address2,
                                country:country,
                                country1:country1,
                                state:state,
                                state1:state1,
                            },
                            cache: false,
                            success: function(dataResult) {
                                console.log(dataResult);
                            },
                            error: function(jqAjax, statusCode, errorThrown) {
                                var err = JSON.parse(jqAjax.responseText);
                                console.log(err);
                               
                            }
                        });
                    });


                });
    google.maps.event.addDomListener(window, 'load', initialize);

    function initialize() {
        var input = document.getElementById('autocomplete');
        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            $('#latitude').val(place.geometry['location'].lat());
            $('#longitude').val(place.geometry['location'].lng());

            $("#latitudeArea").removeClass("d-none");
            $("#longtitudeArea").removeClass("d-none");
        });
    }
</script>
        </main>
    </section>
</x-layout>
