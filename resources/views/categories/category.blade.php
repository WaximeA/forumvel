@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1><b># {{$category->id}}</b> : {{ $category->title }}</h1>
                <p>{{ $category->description }}</p>
               <a href="{{ route('edit_category', $category->id) }}"><span style="float: right">edit</span></a>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            @include('topics/add_topic')
        </div>
        <div class="row">&nbsp;</div>
        @foreach($topics as $topic)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <span><b>{{ $topic->title }}</b><a href="{{ route('edit_topic', $topic->id) }}"><span style="float: right">edit</span></a></span>
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
        <a href="{{ route('categories') }}" class="btn btn-primary">Return</a>
    </div>
@endsection
