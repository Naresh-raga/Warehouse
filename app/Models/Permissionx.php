<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permissionx extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'permissions';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'role_id',
        'add',
        'edit',
        'delete',
        'view',
        'created_at',
        'updated_at'
    ];

    
}