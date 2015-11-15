<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['device_id', 'name'];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function metadata()
    {
        return $this->hasMany(Metadata::class);
    }
}
