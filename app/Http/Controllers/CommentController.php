<?php

namespace App\Http\Controllers;

use App\User;
use App\Topics;
use App\Comments;
use App\Images;
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
        $commentImage = $request->file('comment_image');

        $this->validate($request, [
            'content' => 'required'
        ]);

        $comment = new Comments;
        $comment->content = $content;
        $comment->user_id = auth()->user()->id;
        $comment->topic_id = $topicId;
        $comment->save();

        $commentId = $comment->id;
        if (isset($commentImage)) {
            $fetchImage = $this->addCommentImage($commentImage, $commentId);
            $comment->image_id = $fetchImage['imageId'];
            $comment->image_src = $fetchImage['imageSrc'];
            $comment->save();
        }

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
        $commentImage = $request->file('comment_image');

        $this->validate($request, [
            'content' => 'required'
        ]);

        $comment = new Comments;
        $comment->content = $content;
        $comment->user_id = auth()->user()->id;
        $comment->topic_id = $topicId;
        $comment->parent_id = $parentId;
        $comment->save();

        $commentId = $comment->id;
        if (isset($commentImage)) {
            $fetchImage = $this->addCommentImage($commentImage, $commentId);
            $comment->image_id = $fetchImage['imageId'];
            $comment->image_src = $fetchImage['imageSrc'];
            $comment->save();
        }

        return redirect()->route('topic', ['id' => $topicId])->with('success', 'You successfully answer to the comment #'.$commentId.' :)');
    }

    public function getDeleteComment($id)
    {
        $currentComment = Comments::find($id);
        $currentTopicId = $currentComment->topic_id;

        // delete current topic
        $currentComment->deleteComment();

        return redirect()->route('topic', ['id' => $currentTopicId]);
    }

    public function addCommentImage($commentImage, $commentId)
    {
        $destinationPath = 'uploads';

        // Create new image object with uploaded file data
        $image = new Images;
        $image->comment_id = $commentId;
        $image->original_name = $commentImage->getClientOriginalName() ;
        $image->filename = $commentImage->getFilename();
        $image->size = $commentImage->getSize();
        $image->src = $destinationPath. '/' . $commentImage->getFilename();
        $image->mime_type = $commentImage->getMimeType();
        $image->extension = $commentImage->getClientOriginalExtension();
        $image->save();

        // Move new image in desitination folder
        $commentImage->move($destinationPath,$commentImage->getFilename());

        $data = [
            'imageId' => $image->id,
            'imageSrc' => $image->src
         ];

        return $data;
    }
}
