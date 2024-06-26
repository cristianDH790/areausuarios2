<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;
    public function type_service()
    {
        return $this->belongsTo(Type_Service::class);
    }
    public function certificate()
    {
        return $this->hasOne(Certificate::class);
    }
    public function firms()
    {
        return $this->belongsToMany(firm::class);
    }
    public function exhibitors()
    {
        return $this->belongsToMany(Exhibitor::class);
    }
}