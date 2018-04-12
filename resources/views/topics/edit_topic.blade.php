@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>Edit the topic <b>#{{ $topic->id }}</b> : {{ $topic->title }}</h3>
                {!! Form::open(array('url' => '/edit-topic/submit-edit-topic')) !!}
                {{ Form::hidden('topic_id', $topic->id) }}
                <div class="form-group">
                    {{ Form::label('title', 'Edit title') }}
                    {{ Form::text('title', $topic->title, ['class'=>'form-control', 'placeholder'=>'Enter the new topic title']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('content', 'Edit content') }}
                    {{ Form::textArea('content', $topic->content, ['class'=>'form-control', 'placeholder'=>'Enter the new topic content']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('category_id', 'Change topic\'s category') }}
                    {{ Form::select('category_id', $categories, $topic->category_id, ['class' => 'form-control'])  }}
                </div>
                <div>
                    {{ Form::submit('Edit', ['class'=>'btn btn-success btn-lg float-right']) }}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <a href="{{ route('topic', $topic->id) }}" class="btn btn-primary">Return</a>
    </div>
@endsection
