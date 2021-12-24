<?php

namespace App\Domains\Auth\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    // Table Name
    protected $table = 'league';
    // Primary Key
    public $primaryKey = 'id';
    //Timestamps
    protected $filliablle = [
        'country',
        'name',
        'type',
        'logo'
    ];
    public $timestamps = true;

    public function teams(){
        return $this->hasMany(Teams::class);
    }

  /*  public function sports(){
        return $this->belongsTo(Sports::class, 'sports_id');
    }
*/

}
