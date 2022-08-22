<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Warehouse extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'warehouses';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'name',
        'owner',
        'category',
        'address',
        'phone',
        'state',
        'city',
        'pincode',
        'latitude',
        'longitude',
        'created_at',
        'updated_at'
    ];

    function owner(){
        return $this->belongsTo('\App\Models\User', 'owner');
    }

    function category(){
        return $this->belongsTo('\App\Models\Category', 'category');
    }
}