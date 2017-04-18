<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App
 */
class Post extends Model
{

    /**
     * @var array
     */
    public $fillable = [
        'title',
        'category_id',
        'slected_image',
        'body'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        //Post belongs to a category
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        //Post belongs to a category
        return $this->belongsToMany(Tag::class);
    }

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @param $title
     */
    public function setTitleAttribute ($title) {
        $this->slug = str_slug($title);
        $this->attributes['title'] = $title;
    }

}
