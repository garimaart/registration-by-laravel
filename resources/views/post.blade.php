<x-layout>
    <div class="container mt-3">
        <table class="table table-bordered">
            <tr>
                <th>title</th>
                <th>slug</th>
            </tr>
            @isset($posts)
                @foreach ($posts as $post)
                    <tr>
                        <td><a href="{{ url('detail/' . $post->id) }}">{{ $post->title }}</a></td>
                        <td>{{ Str::words($post->body, 5, '...') }}</td>
                    </tr>
                @endforeach
            @endisset
        </table>
    </div>
</x-layout>
