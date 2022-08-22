<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Testimonial extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'testimonial';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'title',
        'description',
        'author',
        'author_image',
        'created_at',
        'updated_at'
    ];
}