<?php

namespace App\Domains\Auth\Models;
// use App\Domains\Auth\Models\Role;


use App\Domains\Auth\Http\Controllers\Backend\Sports\SportsController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sports extends Model
{
    // Table Name
    protected $table = 'sports';
    // Primary Key
    public $primaryKey = 'sports_id';

    protected $filliablle = [
        'sport_name',
        'type',
        'user_id'
    ];
    //Timestamps
    public $timestamps = true;


    public function teams(){
        return $this->hasMany(Teams::class);
    }

}