<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    use HasFactory;
    protected $fillable = [
        'competition',
        'play_date',
        'versus',
        'first_score_in',
        'second_score_in',
        'third_score_in',
        'fourth_score_in',
        'first_score_out',
        'second_score_out',
        'third_score_out',
        'fourth_score_out',
        'score_in',
        'score_out',
        'h_point',
        'h_rebound',
        'h_assist',
        'h_steal',
    ];
}
