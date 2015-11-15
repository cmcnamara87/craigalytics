<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable = ['device_id', 'metadata', 'name'];

    public function device()
    {
        return $this->belongsTo(Devices::class, 'device_id');
    }

    public function metadata()
    {
        return $this->hasMany(Metadata::class, 'event_id');
    }
}
