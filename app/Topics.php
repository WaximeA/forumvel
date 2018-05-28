<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Comment;

class Topics extends Model
{
    /**
     * Get the user for the topics.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the categories for the topics.
     */
    public function categories()
    {
        return $this->belongsTo('App\Categories');
    }

    /**
     * Get the comments for user.
     */
    public function comments()
    {
        return $this->hasMany('App\Comments');
    }

    public function deleteTopic()
    {
        $topicComment = Comments::where('topic_id', $this->id);
        $topicComment->delete();

        return parent::delete();
    }
}
