@extends('layout')

@section('content')
@foreach ($posts as $post)
<article>
    <h1>
        {{$post->title}}
        </a>
    </h1>
    <p><a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a></p>
    <div>
        {{$post->excerpt}}
    </div>
</article>

    
@endforeach
    
@endsection
