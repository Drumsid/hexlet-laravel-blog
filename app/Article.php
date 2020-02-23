<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['name', 'body', 'state'];

    public function isPublished()
    {
        return $this->state == 'published';
    }
}
