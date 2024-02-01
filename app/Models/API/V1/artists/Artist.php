<?php

namespace App\Models\API\V1\artists;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    public $timestamps = true;
    protected $fillable = ['name', 'bio', 'image_url'];
}
