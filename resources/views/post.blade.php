<x-layout>
    <article>
      
        <div>
            <h1>
                {!!$post->title!!}
            </h1>
    <p>By <a href="#">jhon wick</a>in <a href="/categories/{{$post->category->id}}">{{$post->category->name}}</a></p>
            
            <p>{!!$post->body!!}</p>
        </div>
    </article>
        