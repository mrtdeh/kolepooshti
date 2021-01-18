<?php

namespace App\Models;

use App\Models\ClassRoom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Base extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    
    public function rooms()
    {
        return $this->hasMany( ClassRoom::class );
    }

}
