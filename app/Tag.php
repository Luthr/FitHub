<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tag
 * @package App
 */
class Tag extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts(){
        // belongs to a many to many relation
        return $this->belongsToMany(Post::class);
    }

}
