<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function field(){
        return $this->belongsTo(Field::class);
    }

    public function rental(){
        return $this->hasMany(Rental::class);
    }

    public function serviceType(){
        return $this->belongsTo(ServiceType::class);
    }
}
