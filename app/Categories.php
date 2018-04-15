<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    /**
     * Get the user for the category.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the topics for categories.
     */
    public function topics()
    {
        return $this->hasMany('App\Topics');
    }
}
