<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Culture extends Model
{
    protected $fillable = [
        'title', 'description', 'image',
        'category_id', 'latitude', 'longitude',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
