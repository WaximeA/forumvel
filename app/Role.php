<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Get the role users.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
