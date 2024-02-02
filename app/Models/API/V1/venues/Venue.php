<?php

namespace App\Models\API\V1\venues;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    public $timestamps = true;
    protected $fillable = ['name', 'location', 'capacity'];
}
