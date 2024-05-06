<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class topic extends Model
{
    use HasFactory;

    public function sub_topics()
    {
        return $this->hasMany(sub_topic::class);
    }
    public function module()
    {
        return $this->belongsTo(module::class);
    }
}
