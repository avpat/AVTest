<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    protected $guarded = [];

    protected $fillable = ['filename', 'type', 'size', 'path'];

}
