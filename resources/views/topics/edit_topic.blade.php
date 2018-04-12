@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Edit the topic : {{ $topic->title }}</h1>
                {!! Form::open(array('url' => '/edit-topic/submit-edit-topic')) !!}
                {{ Form::hidden('topic_id', $topic->id) }}
                <div class="form-group">
                    {{ Form::label('title', 'Title') }}
                    {{ Form::text('title', $topic->title, ['class'=>'form-control', 'placeholder'=>'Enter the new topic title']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('content', 'Content') }}
                    {{ Form::textArea('content', $topic->content, ['class'=>'form-control', 'placeholder'=>'Enter the new topic content']) }}
                </div>
                <div>
                    {{ Form::submit('Submit', ['class'=>'btn btn-success btn-lg float-right']) }}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <a href="{{ route('topic', $topic->id) }}" class="btn btn-primary">Return</a>
    </div>
@endsection
