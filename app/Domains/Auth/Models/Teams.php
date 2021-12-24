<?php

namespace App\Domains\Auth\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    // Table Name
    protected $table = 'teams';
    // Primary Key
    public $primaryKey = 'team_id';
    //Timestamps
    protected $filliablle = [
        'name',
        'country',
        'founded',
        'national',
        'logo',
        'league'
    ];
    public $timestamps = true;

    /*public function sports(){

        return $this->belongsTo(Sports::class, 'sports_id');
    }
    */
    public function league(){

        return $this->belongsTo(League::class, 'league_id');
    }

    public function teams(){
        return $this->hasMany(Players::class);
    }


}
