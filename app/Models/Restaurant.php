<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ru',
        'title_en',
        'title_kk',
        'description_ru',
        'description_en',
        'description_kk',
        'image',
        'latitude',
        'longitude',
    ];

    public function getTitleAttribute()
    {
        $lang = app()->getLocale(); // автоматически берём текущий язык
        return $this->{'title_' . $lang} ?? $this->title_ru;
    }

    public function getDescriptionAttribute()
    {
        $lang = app()->getLocale();
        return $this->{'description_' . $lang} ?? $this->description_ru;
    }
}
