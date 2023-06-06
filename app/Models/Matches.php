<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    use HasFactory;
    protected $guarded = [];   
    public function league()
    {
        return $this->belongsTo(League::class, 'league_id');
    }

}
