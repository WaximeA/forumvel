<div class="col-md-10">
    <h1>Add a comment</h1>
    {!! Form::open(array('url' => '/add-comment/submit-add-comment')) !!}
    {{ Form::hidden('topic_id', $topic->id) }}
    {{--<div class="form-group">--}}
        {{--{{ Form::label('content', 'Comment content') }}--}}
        {{--{{ Form::textArea('content', '', ['class'=>'form-control', 'placeholder'=>'Write what you want to share']) }}--}}
    {{--</div>--}}
    {{--<div>--}}
        {{--{{ Form::submit('Submit', ['class'=>'btn btn-success btn-lg float-right']) }}--}}
    {{--</div>--}}


    <div class="comment-wrap">
        <div class="photo">
            <div class="avatar" style="background-image: url('https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/128.jpg')"></div>
        </div>
        <div class="comment-block">
            {{--{{ Form::label('content', 'Comment content') }}--}}
                {{ Form::textArea('content', '', ['class'=>'form-control comment-area', 'placeholder'=>'Write what you want to share']) }}
        </div>
        <div>
            {{ Form::submit('Submit', ['class'=>'btn btn-dark btn-lg float-right']) }}
        </div>
    </div>
    {!! Form::close() !!}
</div>
