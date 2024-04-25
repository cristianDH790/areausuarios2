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
    public function firms()
    {
        return $this->belongsToMany(firm::class);
    }
    public function exhibitors()
    {
        return $this->belongsToMany(Exhibitor::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
