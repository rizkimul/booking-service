<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'start', 'end'
    ];

    public function room(){
        return $this->belongsTo(Room::class);
    }

    public function building(){
        return $this->belongsTo(Building::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
