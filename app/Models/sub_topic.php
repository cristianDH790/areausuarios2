<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_topic extends Model
{
    use HasFactory;
    public function topic()
    {
        return $this->belongsTo(topic::class);
    }
}
