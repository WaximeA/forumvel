<div class="col-md-8">
    <h1>Add your topic</h1>
    {!! Form::open(array('url' => '/add-topic/submit-add-topic')) !!}
    {{ Form::hidden('category_id', $category->id) }}
    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', '', ['class'=>'form-control', 'placeholder'=>'Enter the topic title']) }}
    </div>
    <div class="form-group">
        {{ Form::label('content', 'Content') }}
        {{ Form::textArea('content', '', ['class'=>'form-control', 'placeholder'=>'Enter the topic content']) }}
    </div>
    <div>
        {{ Form::submit('Submit', ['class'=>'btn btn-success btn-lg float-right']) }}
    </div>
    {!! Form::close() !!}
</div>
