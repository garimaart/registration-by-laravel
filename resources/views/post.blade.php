<x-layout>
    <article>
      
        <div>
            <h1>
                {!!$post->title!!}
            </h1>
    <p> <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a></p>
            
            <p>{!!$post->body!!}</p>
        </div>
    </article>
</x-layout>
        