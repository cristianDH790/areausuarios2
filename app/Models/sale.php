<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function bank()
    {
        return $this->belongsTo(bank::class);
    }
    public function saleDetails()
    {
        return $this->hasMany(sale_detail::class);
    }
}
