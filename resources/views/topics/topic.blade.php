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
        <a href="{{ route('category', $parentCategory->id) }}" class="btn btn-primary">Return</a>
    </div>
@endsection
