<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Topics;
use App\Comments;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    public function submitAddTopic(Request $request)
    {
        // Form fields values
        $title = $request->input('title');
        $content = $request->input('content');
        $categoryId = $request->input('category_id');

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        $topic = new Topics;
        $topic->title = $title;
        $topic->content = $content;
        $topic->author_id = auth()->user()->id;
        $topic->category_id = $categoryId;
        $topic->save();

        //return redirect('category', ['id' => $categoryId])->with('success', 'You successfully create a new topic in the category #'.$categoryId.' :)');
        return redirect()->route('category', ['id' => $categoryId])->with('success', 'You successfully create a new topic in the category #'.$categoryId.' :)');
    }

    public function getTopic($id)
    {
        $topic = Topics::find($id);
        $parentCategory = Categories::find($topic->category_id);
        $userId = auth()->user()->id;
        $user = User::find($userId);
        $comments = Comments::all()->where('topic_id', '==', $id);
        $isUserIsAuthor = $this->isUserIsAuthor($topic);
        $isAllowedEdit = $this->isAllowedEdit();

        $data = [
            'topic' => $topic,
            'parentCategory' => $parentCategory,
            'comments' => $comments->reverse(),
            'user' => $user,
            'isUserIsAuthor' => $isUserIsAuthor,
            'isAllowedEdit' => $isAllowedEdit
        ];

        return view('topics/topic')->with($data);
    }

    public function getTopics()
    {
        $topics = Topics::all();

        return $topics;
    }

    public function getEditTopic($id)
    {
        $topic = Topics::find($id);
        $categories = app('App\Http\Controllers\CategoryController')->getSelectedCategories();

        $data = [
            'topic' => $topic,
            'categories' => $categories
        ];

        return view('topics/edit_topic')->with($data);
    }

    public function submitEditTopic(Request $request)
    {
        // Form fields values
        $title = $request->input('title');
        $content = $request->input('content');
        $categoryId = $request->input('category_id');
        $topicId = $request->input('topic_id');

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        Topics::where('id', $topicId)
            ->update([
                'title' => $title,
                'content' => $content,
                'category_id' => $categoryId
             ]);

        return redirect()->route('topic', ['id' => $topicId])->with('success', 'You successfully create a new topic in the category #'.$topicId.' :)');
    }

    public function getDeleteTopic($id)
    {
        $currentTopic = Topics::find($id);
        $currentTopicCategoryId = $currentTopic->category_id;

        // delete current topic
        $currentTopic->deleteTopic();

        return redirect()->route('category', ['id' => $currentTopicCategoryId]);
    }

    public function isUserIsAuthor($topic)
    {
        $user = Auth::user();
        $userId = $user->id;
        $topicAuthorId = $topic->author_id;

        if ($userId != $topicAuthorId){
            return false;
        }

        return true;
    }

    public function isAllowedEdit()
    {
        $allowedRoles = [
            'administrator',
            'moderator'
        ];
        $user = Auth::user();
        foreach ($allowedRoles as $allowedRole){
            if ($user->hasRole($allowedRole)){
                return true;
            }
        }

        return false;
    }
}
