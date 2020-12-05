<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeAllowed($query)
    {
        if (auth()->user()->can('View',$this))
        {
           return $query;
        }

        return $query->where('user_id',auth()->id());

    }
}


