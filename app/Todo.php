<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    /**
     * Get the user that owns the todo.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
