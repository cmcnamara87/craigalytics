<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable = ['device_id', 'data', 'name'];

    public function device()
    {
        return $this->hasOne(Devices::class, 'id');
    }

    public function metadata()
    {
        return $this->hasMany(Metadata::class, 'event_id');
    }
}
