<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    /**
     * Get comment that owns image.
     */
    public function comments()
    {
        return $this->belongsTo('App\Comments');
    }
}
