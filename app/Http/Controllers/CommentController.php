<?php

namespace App\Http\Controllers;

use App\User;
use App\Topics;
use App\Comments;
use Illuminate\Http\Request;
use PhpParser\Comment;

class CommentController extends Controller
{
    public function getComments()
    {
        $comments = Comments::all();

        return $comments;
    }

    public function submitAddComment(Request $request)
    {
        // Form fields values
        $content = $request->input('content');
        $topicId = $request->input('topic_id');

        $this->validate($request, [
            'content' => 'required'
        ]);

        $comment = new Comments;
        $comment->content = $content;
        $comment->user_id = auth()->user()->id;
        $comment->topic_id = $topicId;
        $comment->save();

        return redirect()->route('topic', ['id' => $topicId])->with('success', 'You successfully add a comment on topic #'.$topicId.' :)');
    }

    public function getAnswerComment($id)
    {
        $parentComment = Comments::find($id);

        $data = [
            'parentComment' => $parentComment
        ];

        return view('comments/answer_comment')->with($data);
    }

    public function submitAnswerComment(Request $request)
    {
        // Form fields values
        $content = $request->input('content');
        $topicId = $request->input('topic_id');
        $parentId = $request->input('parent_id');

        $this->validate($request, [
            'content' => 'required'
        ]);

        $comment = new Comments;
        $comment->content = $content;
        $comment->user_id = auth()->user()->id;
        $comment->topic_id = $topicId;
        $comment->parent_id = $parentId;
        $commentId = $comment->id;
        $comment->save();

        return redirect()->route('topic', ['id' => $topicId])->with('success', 'You successfully answer to the comment #'.$commentId.' :)');
    }

    public function getDeleteComment($id)
    {
        $currentComment = Comments::find($id);
        $currentTopicId = $currentComment->topic_id;

        // delete current topic
        $currentComment->delete();

        return redirect()->route('topic', ['id' => $currentTopicId]);
    }
}
