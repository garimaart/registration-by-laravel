@extends('layout')
@section('content')
    
    <article>
      
        <div>
            <h1>
                {!!$post->title!!}
            </h1>
    <p>By <a href="/authors/{{$post->author->username}}"></a>{{$post->author->name}}
        
        in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a></p>
            
            <p>{!!$post->body!!}</p>
        </div>
    </article>

@endsection