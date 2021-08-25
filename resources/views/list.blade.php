<x-layout>
    <table class="table table-hover" style="border: 1px solid black;">

        <thead style=" border: 1px solid black;">

            <th>id</th>

            <th>user id</th>

            <th>category id</th>
            <th>slug</th>
            <th>title</th>
            <th>excerpt</th>
            <th>body</th>

        </thead>

        <tbody style="border: 1px solid black;">
            @foreach ($posts as $post)

                <tr>

                    <td style=" border: 1px solid black;">{{ $post->id }} </td>

                    <td style=" border: 1px solid black;">{{ $post->user_id }} </td>

                    <td style=" border: 1px solid black;">{{ $post->category_id }} </td>

                    <td style=" border: 1px solid black;">{{ $post->slug }} </td>

                    <td style=" border: 1px solid black;">{{ $post->title }} </td>

                    <td style=" border: 1px solid black;">{{ $post->excerpt }} </td>

                    <td style=" border: 1px solid black;">{{ $post->body }} </td>

                </tr>
            @endforeach

        </tbody>

    </table>
</x-layout>
