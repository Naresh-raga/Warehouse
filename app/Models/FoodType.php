<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class FoodType extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'food_type';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'title',
        'created_at',
        'updated_at'
    ];
}