<!DOCTYPE html>
<html>

<head>
    <title>Post List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
</head>

<body>
    <div class="container mt-3">
        <table class="table table-bordered">
            <tr>
                <th>Title</th>
                <th>slug</th>
            </tr>
            @isset($posts)
                @foreach ($posts as $post)
                    <tr>
                        <td><a href="{{ url('detail/' . $post->id) }}">{{ $post->title }}</a></td>
                        <td>{{ Str::words($post->slug, 5, '...') }}</td>
                    </tr>
                @endforeach
            @endisset
        </table>
    </div>
</body>

</html>
