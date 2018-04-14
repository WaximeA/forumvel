@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-lg-8">
                <h1><b># {{$topic->id}}</b> : {{ $topic->title }}</h1>
                <p>{{ $topic->content }}</p>
            </div>
            <div class="col-md-2">
                <a href="{{ route('edit_topic', $topic->id) }}" class="btn btn-primary"><span style="float: right">edit</span></a>
            </div>
        </div>
        <hr>
        <div class="row">&nbsp;</div>
        @foreach($comments as $comment)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <p>Commentaire #{{ $comment->id }} @if($comment->parent_id)/ Parent comment : # {{ $comment->parent_id }} @endif</p>
                            <span>
                                <b>#{{ $user->id }} {{ ucfirst($user->name) }}</b> : <i>{{ $user->email }}</i>
                                <a href="{{ route('answer_comment', $comment->id) }}" class="btn btn-sm btn-primary" style="float:right">Answer to #{{ $comment->id }}</a>
                            </span>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $comment->content }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
        @endforeach
        <div class="row justify-content-center">
            @include('comments/add_comment')
        </div>
        <a href="{{ route('category', $parentCategory->id) }}" class="btn btn-primary">Return</a>
    </div>
@endsection
