<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory;
    protected $guarded = [];   
    public function match()
    {
        return $this->hasMany(Matches::class, 'league_id');
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }
    
    public function matches()
    {
        return $this->hasMany(Matches::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
