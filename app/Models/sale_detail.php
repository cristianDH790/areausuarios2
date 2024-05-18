<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sale_detail extends Model
{
    use HasFactory;


    public function service()
    {
        return $this->belongsTo(service::class);
    }
    public function sale()
    {
        return $this->belongsTo(sale::class);
    }
}
