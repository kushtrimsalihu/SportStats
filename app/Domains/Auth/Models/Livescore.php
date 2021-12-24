<?php

namespace App\Domains\Auth\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livescore extends Model
{
    // Table Name
    protected $table = 'livescore';
    // Primary Key
    public $primaryKey = 'id';
    //Timestamps
    protected $fillable = [
            'league_name_sdn',
            'team1_name_nm',
            'team2_name_nm',
            'team1_goal_tr1',
            'team2_goal_tr2',
            'team1_t1_img',
            'team2_t2_img'
    ];
    public $timestamps = false;





}
