@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>Edit the category <b>#{{ $category->id }}</b> : {{ $category->title }}</h3>
                {!! Form::open(array('url' => '/edit-category/submit-edit-category')) !!}
                {{ Form::hidden('category_id', $category->id) }}
                {{ Form::hidden('parent_id', $category->parent_id) }}
                <div class="form-group">
                    {{ Form::label('title', 'Edit title') }}
                    {{ Form::text('title', $category->title, ['class'=>'form-control', 'placeholder'=>'Enter the new category title']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('description', 'Edit description') }}
                    {{ Form::textArea('description', $category->description, ['class'=>'form-control', 'placeholder'=>'Enter the new category description']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('parent_id', 'Change category\'s parent category') }}
                    {{ Form::select('parent_id', $categories, $category->parent_id, ['class' => 'form-control', 'placeholder' => 'There is no parent category'])  }}
                </div>
                <div>
                    {{ Form::submit('Edit', ['class'=>'btn btn-success btn-lg float-right']) }}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <a href="{{ route('category', $category->id) }}" class="btn btn-primary">Return</a>
    </div>
@endsection
