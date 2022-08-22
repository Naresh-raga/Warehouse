<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'setting';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'email',
        'mobile',
        'address',
        'fb_link',
        'twitter_link',
        'google_link',
        'instagram_link',
        'whatsapp_number',
        'created_at',
        'updated_at'
    ];
}