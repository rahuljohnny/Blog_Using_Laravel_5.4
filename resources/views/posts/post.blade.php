<div class="blog-post">

    <p class="blog-post-meta">

        <a href="posts/{{$post->id}}">
            <h2 class="blog-post-title">{{$post->title}}</h2>
        </a>
        {{$post->created_at}}

    </p>

    <p>
        {{$post->body}}
    </p>
</div>