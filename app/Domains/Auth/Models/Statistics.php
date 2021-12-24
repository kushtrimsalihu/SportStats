<?php

namespace App\Domains\Auth\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    protected $table = 'statistics';
    protected $filliable = [
        'matches_played',
        'goals',
        'assists',
        'yellow_card',
        'red_card',
        'player',
        'from_date',
        'to_date',
        'league'
    ];
    public $timestamps = true;

    public function league(){
        return $this->belongsTo(League::class, 'league');
    }
    public function players(){
        return $this->belongsTo(Players::class, 'player');
    }
}