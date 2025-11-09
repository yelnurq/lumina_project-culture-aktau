<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ru', 'title_en', 'title_kk',
        'excerpt_ru', 'excerpt_en', 'excerpt_kk',
        'description_ru', 'description_en', 'description_kk',
        'address_ru', 'address_en', 'address_kk',
        'phone', 'email', 'website', 'working_hours',
        'instagram', 'facebook', 'telegram',
        'latitude', 'longitude', 'image', 'slug'
    ];

    public function rooms()
    {
        return $this->hasMany(HotelRoom::class);
    }

    public function images()
    {
        return $this->hasMany(HotelImage::class);
    }
}
