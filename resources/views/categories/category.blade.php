@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-lg-8">
                <h1><b># {{$category->id}}</b> : {{ $category->title }}</h1>
                <p>{{ $category->description }}</p>
            </div>
            <div class="col-md-2">
                <a href="{{ route('edit_category', $category->id) }}" class="btn btn-primary btn-sm"><span style="float: right">edit</span></a>
                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">delete</a>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Delete category <b>#{{ $category->id  }} : {{ $category->title }}</b> </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5>Are you shure you want to delete this category ?</h5>
                                <p><b>Be carefull,</b> It will also delete all subcategories</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a href="{{ route('delete_category', $category->id) }}">
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
        @foreach($topics as $topic)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <span><b>{{ $topic->title }}</b><a href="{{ route('edit_topic', $topic->id) }}"><span class="btn btn-primary btn-sm" style="float: right">edit</span></a></span>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $topic->content }}</p>
                            <a href="{{ route('topic', $topic->id) }}" class="btn btn-primary">Go on the topic</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
        @endforeach
        <div class="row justify-content-center">
            @include('topics/add_topic')
        </div>
        <a href="{{ route('categories') }}" class="btn btn-primary">Return</a>
    </div>
@endsection
