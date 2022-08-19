<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'parent_id',
        'checked',
        'node',
    ];
    protected $table = 'role';
    public $timestamps = false;

}
