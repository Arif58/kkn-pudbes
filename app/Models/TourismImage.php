<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourismImage extends Model
{
    // use HasFactory;
    protected $table = 'tourism_images';
    
    public function tourism()
    {
        return $this->belongsTo(Tourisms::class);
    }

}