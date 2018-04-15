@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Answer to the comment {{ $parentComment->id }}</h1>
                {!! Form::open(array('url' => '/answer-comment/submit-answer-comment')) !!}
                {{ Form::hidden('topic_id', $parentComment->topic_id) }}
                {{ Form::hidden('parent_id', $parentComment->id) }}
                <div class="form-group">
                    {{ Form::label('content', 'Answer content') }}
                    {{ Form::textArea('content', '', ['class'=>'form-control', 'placeholder'=>'Write what you answer']) }}
                </div>
                <div>
                    {{ Form::submit('Submit', ['class'=>'btn btn-success btn-lg float-right']) }}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <a href="{{ route('topic', $parentComment->topic_id) }}" class="btn btn-primary">Return</a>
    </div>
@endsection
