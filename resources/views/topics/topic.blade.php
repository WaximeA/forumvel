@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-lg-8">
                <h1><b># {{$topic->id}}</b> : {{ $topic->title }}</h1>
                <p>{{ $topic->content }}</p>
            </div>
            <div class="col-md-2">
                <a href="{{ route('edit_topic', $topic->id) }}" class="btn btn-primary"><span
                            style="float: right">edit</span></a>
            </div>
        </div>
        <hr>
        <div class="row">&nbsp;</div>
        @foreach($comments as $comment)
            <div class="row justify-content-center">
                <div class="col-md-10">
                    {{--<div class="card">--}}
                    {{--<div class="card-header">--}}
                    {{--<p>Commentaire #{{ $comment->id }} @if($comment->parent_id)/ Parent comment : # {{ $comment->parent_id }} @endif</p>--}}
                    {{--<span>--}}
                    {{--<b>#{{ $user->id }} {{ ucfirst($user->name) }}</b> : <i>{{ $user->email }}</i>--}}
                    {{--<a href="{{ route('answer_comment', $comment->id) }}" class="btn btn-sm btn-primary" style="float:right">Answer to #{{ $comment->id }}</a>--}}
                    {{--</span>--}}
                    {{--</div>--}}
                    {{--<div class="card-body">--}}
                    {{--<p class="card-text">{{ $comment->content }}</p>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    @empty($comment->parent_id)
                        <div class="comment-wrap comment-parent-{{ $comment->id }}">
                            <div class="photo">
                                <div class="avatar"
                                     style="background-image: url('https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg')"></div>
                            </div>
                            <div class="comment-block">
                                <h3>#{{ $comment->id }} | {{ ucfirst($user->name) }}</h3>
                                <hr>
                                <p class="comment-text">{{ $comment->content }}</p>
                                <div class="bottom-comment">
                                    <div class="comment-date">{{ $comment->created_at }}</div>
                                    <ul class="comment-actions">
                                        {{--<li class="complain">Complain</li>--}}
                                        <li class="reply"><a
                                                    href="{{ route('answer_comment', $comment->id) }}">Reply</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>


                @isset($comment->parent_id)
                    <div data-parent="{{ $comment -> parent_id }}" class="comment-wrap comment-child col-md-11">
                        <div class="photo">
                            <div class="avatar" style="background-image: url('https://s3.amazonaws.com/uifaces/faces/twitter/felipenogs/128.jpg')"></div>
                        </div>
                    <div class="comment-block">
                            <h5>{{ ucfirst($user->name) }}</h5>
                            <hr>
                            <p class="comment-text">{{ $comment->content }}</p>
                            <div class="comment-date">{{ $comment->created_at }}</div>
                            <ul class="comment-actions text-right">
                                <li class="reply"><a href="{{ route('answer_comment', $comment->id) }}">Reply</a></li>
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
        <div class="row justify-content-center">
            @include('comments/add_comment')
        </div>
        <a href="{{ route('category', $parentCategory->id) }}" class="btn btn-primary">Return</a>
    </div>
@endsection
