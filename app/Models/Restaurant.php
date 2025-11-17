<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
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

    public function dishes()
    {
        return $this->hasMany(RestaurantDish::class);
    }

    public function images()
    {
        return $this->hasMany(RestaurantImage::class);
    }
}
