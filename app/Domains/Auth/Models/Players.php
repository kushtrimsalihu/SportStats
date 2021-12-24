<?php 

namespace App\Domains\Auth\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    protected $table = 'players';
    public $primaryKey = 'player_id';
    protected $filliable = [
        'photo',
        'firstname',
        'lastname',
        'age',
        'height',
        'nationality',
        'place'
   
        
    ];
    public $timestamps = true;

    public function teams(){

        return $this->belongsTo(Teams::class, 'team_id');
    }


}
