<?php

namespace App\Domains\Auth\Models;
// use App\Domains\Auth\Models\Role;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    // Table Name
    protected $table = 'position';
    // Primary Key
    public $primaryKey = 'position_id';

    protected $filliablle = [
        'position_type',
        'sport'
    ];
    //Timestamps
    public $timestamps = true;


    public function sports(){

       return $this->belongsTo(Sports::class , 'sport');
   }

    
}

