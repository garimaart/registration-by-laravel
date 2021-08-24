<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-300 border border-gray-500 p-6 rounded-xl">
            <h1 class="text-center font-bold txt-ml">login</h1>
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
        <div class="form-group">
            <input type="hidden" name="_token" id="csrf" value="{{ Session::token() }}">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email1" placeholder="Enter Email" name="email">
        </div>
        <div class="form-group">
            <label for="email">password:</label>
            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
        </div>
        <button type="submit" class="btn btn-primary" id="butsave">Submit</button>
        </div>
        <script>
            $(document).ready(function() {

                $('#butsave').on('click', function() {
                    var email = $('#email1').val();
                    var password = $('#password').val();
                    if (email != "" &&  password != "") {
                        $.ajax({
                            url: "/login",
                            type: "POST",
                            data: {
                                _token: $("#csrf").val(),
                                type: 1,
                                email: email,
                                password:password,
                            },
                            cache: false,
                            success: function(dataResult) {
                                console.log(dataResult);
                                var dataResult = JSON.parse(dataResult);
                                if (dataResult.statusCode == 200) {
                                    alert("you are login");
                                    window.location = "/";
                                }

                            }
                        });
                    } else
                        alert('PLEASE FILL ALL THE FIELD !');
                    });
            });
        </SCRIPT>
        </main>
    </section>
</x-layout>
