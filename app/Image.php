<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['path'];

    public function getUrlPath()
    {
        return \Storage::url($this->path);
    }
}
