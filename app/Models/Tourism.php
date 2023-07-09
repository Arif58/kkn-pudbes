<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tourism extends Model
{
    protected $table = 'tourisms';
    
    public function images()
    {
        return $this->hasMany(TourismImage::class);
    }

}