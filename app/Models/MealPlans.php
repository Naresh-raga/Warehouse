<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MealPLans extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'meal_plans';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'title',
        'image',
        'description',
        'qty_per_day',
        'price',
        'created_at',
        'updated_at'
    ];
}