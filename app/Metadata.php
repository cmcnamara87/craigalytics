<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metadata extends Model
{
    protected $fillable = ['key', 'value', 'event_id'];
    protected $table = 'metadata';
}
