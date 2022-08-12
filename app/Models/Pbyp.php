<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pbyp extends Model
{
    use HasFactory;
    protected $fillable = [
        'play_date',
        'turn',
        'news_time',
        'team',
        'note',
    ];
    protected $table = 'pbyp';

}
