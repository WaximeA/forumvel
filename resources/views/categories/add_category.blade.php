@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Add your category</h1>
                {!! Form::open(array('url' => '/add-category/submit-add-category')) !!}
                <div class="form-group">
                    {{ Form::label('title', 'Title') }}
                    {{ Form::text('title', '', ['class'=>'form-control', 'placeholder'=>'Enter the category title']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('description', 'Description') }}
                    {{ Form::textArea('description', '', ['class'=>'form-control', 'placeholder'=>'Enter the category description']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('parent_id', 'Parent category') }}
                    {{ Form::select('parent_id', ['' => '', 'L' => 'Large', 'S' => 'Small'], null) }}
                </div>
                <div>
                    {{ Form::submit('Submit', ['class'=>'btn btn-success btn-lg float-right']) }}
                </div>
                {!! Form::close() !!}

            </div>
        </div>
        <a href="{{ URL::route('categories') }}" class="btn btn-primary">Return</a>
    </div>
@endsection
