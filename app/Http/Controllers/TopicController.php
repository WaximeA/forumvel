<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Topics;
use Illuminate\Http\Request;

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
        $data = [
            'topic' => $topic,
            'parentCategory' => $parentCategory
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

        $data = [
            'topic' => $topic,
        ];

        return view('topics/edit_topic')->with($data);
    }

    public function submitEditTopic(Request $request)
    {
        // Form fields values
        $title = $request->input('title');
        $content = $request->input('content');
        $topicId = $request->input('topic_id');

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        Topics::where('id', $topicId)
            ->update([
                'title' => $title,
                'content' => $content,
             ]);

        return redirect()->route('topic', ['id' => $topicId])->with('success', 'You successfully create a new topic in the category #'.$topicId.' :)');
    }
}
