<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournamemts extends Model
{
    use HasFactory;
    protected $fillable = [
        'play_year','competition','team11','team12','team13','team14','team15','team16','team17','team18','team21','team22','team23','team24','team31','team32','team41',
        'score11','score12','score13','score14','score15','score16','score17','score18','score21','score22','score23','score24','score31','score32','score41',
    ];
    public function getName() {
		return $this->belongsTo(Teams::class, "id");
	}
}
