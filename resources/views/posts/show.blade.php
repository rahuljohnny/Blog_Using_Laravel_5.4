@extends('layouts.master')
@section('content')

    <div class="col-sm-8 blog-main">
        <h1><strong>{{$post->title}}</strong></h1>

        {{$post->body}}


        <div class="comments">
            <ul class="list-group">

                @foreach($post->comments as $comment)
                    <hr>
                    <li class="list-group-item">
                        <strong>{{$comment->created_at->diffForHumans()}}:&nbsp;</strong>
                        {{$comment->body}}
                    </li>
                @endforeach

            </ul>
        </div>

        <hr>

        <!-- Creating a Comment Box -->

        <div class="card">
            <div class="card-block">
                @include('layouts.Error_Notifier')


                <form method="POST" action="/posts/{{$post->id}}/comments">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="body" placeholder="Comment..." class="form-control" required>

                        </textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Post a comment</button>
                    </div>

                </form>
            </div>
        </div>




    </div>



@endsection