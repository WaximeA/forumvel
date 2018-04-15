<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    /**
     * Get the user for the comments.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the topics for the comments.
     */
    public function topics()
    {
        return $this->belongsTo('App\Topics');
    }
}
