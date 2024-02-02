<?php

namespace App\Models\API\V1\shows;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    public $timestamps = true;
    protected $fillable = ['artist_id', 'venue_id', 'title', 'description', 'date'];
}
