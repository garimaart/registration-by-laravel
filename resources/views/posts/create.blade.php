<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-300 border border-gray-500 p-6 rounded-xl">
            <h1 class="text-center font-bold txt-ml">Posts</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group mb-6">
                <input type="hidden" name="_token" id="csrf" value="{{ Session::token() }}">
                <label for="text">Slug:</label>
                <input type="text" class="form-control" id="slug" placeholder="Enter slug" name="slug">
            </div>
            <div class="form-group mb-6">
                <label for="user_id">User id:</label>
                <input type="number" class="form-control" id="user_id" placeholder="Enter user_id" name="user_id">
            </div>
            <div class="form-group mb-6">
                <label for="category_id">Category id:</label>
                <input type="number" class="form-control" id="category_id" placeholder="Enter category_id"
                    name="category_id">
            </div>
            <div class="form-group mb-6">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
            </div>
            <div class="form-group mb-6">
                <label for="excerpt">Excerpt:</label>
                <textarea class="form-control" id="excerpt" placeholder="Enter excerpt" name="excerpt"></textarea>
            </div>
            <div class="form-group mb-6">
                <label for="body">Body:</label>
                <textarea class="form-control" id="body" placeholder="Enter body" name="body"></textarea>
            </div>
            <button class="btn btn-primary" id="butsave">Submit</button>
            </div>
            <script>
                $(document).ready(function() {

                    $('#butsave').on('click', function() {
                        var user_id = $('#user_id').val();
                        var category_id = $('#category_id').val();
                        var slug = $('#slug').val();
                        var title = $('#title').val();
                        var excerpt = $('#excerpt').val();
                        var body = $('#body').val();

                        $.ajax({
                            url: "/posts",
                            type: "POST",
                            data: {
                                _token: $("#csrf").val(),
                                type: 1,
                                user_id: user_id,
                                category_id: category_id,
                                slug: slug,
                                title: title,
                                excerpt: excerpt,
                                body: body,
                            },
                            cache: false,
                            success: function(dataResult) {
                                console.log(dataResult);
                                // var dataResult = JSON.parse(dataResult);
                                // if (dataResult.statusCode == 200) {
                                //     alert("posts are save");
                                //     window.location = "/posts";
                                // }
                            },
                            error: function(jqAjax, statusCode, errorThrown) {
                                var err = JSON.parse(jqAjax.responseText);
                                console.log(err.errors);
                                if (err.errors.user_id[0] != "") {
                                    alert(err.errors.user_id[0]);
                                }
                                if (err.errors.category_id[0] != "") {
                                    alert(err.errors.category_id[0]);
                                }
                                if (err.errors.slug[0] != "") {
                                    alert(err.errors.slug[0]);
                                }
                                if (err.errors.title[0] != "") {
                                    alert(err.errors.title[0]);
                                }
                                if (err.errors.excerpt[0] != "") {
                                    alert(err.errors.excerpt[0]);
                                } else(err.errors.body[0] != "") {
                                    alert(err.errors.body[0]);
                                }
                            }
                        });
                    });
                });
            </script>
        </main>
    </section>
</x-layout>
