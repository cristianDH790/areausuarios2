<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class certificate extends Model
{
    use HasFactory;
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function modules()
    {
        return $this->hasMany(Module::class);
    }
    public function type_certificate()
    {
        return $this->belongsTo(Type_Certificate::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('path_certificate', 'delivered_by', 'status');;
    }
}