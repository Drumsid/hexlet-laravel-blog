<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function isPublished()
    {
        return $this->state == 'published';
    }
}
