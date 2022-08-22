<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HContent extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'hcontent';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'video',
        'description',
        'created_at',
        'updated_at'
    ];
}