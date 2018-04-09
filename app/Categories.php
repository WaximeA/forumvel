<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    /**
     * Get the user for the category.
     */
    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
