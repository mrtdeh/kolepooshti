<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    protected $fillable = [
        "start","end"
    ];


    public $timestamps = false;


    public function getTimePlanAttribute()
    {
        return $this->start . " - " . $this->end;
    }
}
