<div class="col-md-8">
    <h1>Add a comment</h1>
    {!! Form::open(['url' => '/add-comment/submit-add-comment', 'files' => true]) !!}
    {{ Form::hidden('topic_id', $topic->id) }}
    <div class="form-group">
        {{ Form::label('content', 'Comment content') }}
        {{ Form::textArea('content', '', ['class'=>'form-control', 'placeholder'=>'Write what you want to share']) }}
    </div>
    <div class="form-group">
        {!! Form::label('Add comment image') !!}
        {!! Form::file('comment_image') !!}
    </div>
    <div>
        {{ Form::submit('Submit', ['class'=>'btn btn-success btn-lg float-right']) }}
    </div>
    {!! Form::close() !!}
</div>
