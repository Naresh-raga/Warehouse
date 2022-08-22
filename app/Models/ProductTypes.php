<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductTypes extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'product_types';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'name',
        'qty',
        'product_type',
        'rate',
        'weight_type',
        'created_at',
        'updated_at'
    ];
}