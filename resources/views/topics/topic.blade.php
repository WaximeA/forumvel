@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-lg-8">
                <h1>Topic <b># {{$topic->id}}</b> : {{ $topic->title }}</h1>
                <p>{{ $topic->content }}</p>
            </div>
            <div class="col-md-2">
                @if($isUserIsAuthor || $isAllowedEdit)
                    <a href="{{ route('edit_topic', $topic->id) }}" class="btn btn-sm btn-primary"><span style="float: right">edit</span></a>
                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">delete</a>
                @endif
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Delete topic <b>#{{ $topic->id  }} : {{ $topic->title }}</b> </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5>Are you shure you want to delete this topic ?</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a href="{{ route('delete_topic', $topic->id) }}">
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
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
                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteTopic" style="float:right; color: white; margin-left: 5px">delete</a>
                                <a href="{{ route('answer_comment', $comment->id) }}" class="btn btn-sm btn-primary" style="float:right; color: white">Answer to #{{ $comment->id }}</a>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteTopic" tabindex="-1" role="dialog" aria-labelledby="deleteTopic" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">Delete comment <b>#{{ $comment->id  }} : {{ $comment->title }}</b> </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Are you shure you want to delete this comment ?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a href="{{ route('delete_comment', $comment->id) }}">
                                                    <button type="button" class="btn btn-danger">Delete</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
