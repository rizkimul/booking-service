<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    public function service(){
        return $this->hasMany(Service::class);
    }
    public function rental(){
        return $this->hasMany(Rental::class);
    }
}
