@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span><b>{{ $topic->title }}</b><a href="{{ route('edit_topic', $topic->id) }}"><span style="float: right">edit</span></a></span>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $topic->content }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">&nbsp;</div>
        <a href="{{ route('category', $parentCategory->id) }}" class="btn btn-primary">Return</a>
    </div>
@endsection
