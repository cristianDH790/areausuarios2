<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class module extends Model
{
    use HasFactory;

    public function topics()
    {
        return $this->hasMany(topic::class);
    }
    public function sub_topics()
    {
        return $this->hasMany(sub_topic::class);
    }

    public function materials()
    {
        return $this->hasMany(material::class);
    }
    public function video()
    {
        return $this->hasOne(video::class);
    }
    public function certificate()
    {
        return $this->belongsTo(certificate::class);
    }
}