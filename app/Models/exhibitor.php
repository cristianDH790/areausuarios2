<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exhibitor extends Model
{
    use HasFactory;
    public function certificates()
    {
        return $this->belongsToMany(Certificate::class);
    }
}
