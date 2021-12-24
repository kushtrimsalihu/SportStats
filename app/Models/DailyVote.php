<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domains\Auth\Models\Teams;

class DailyVote extends Model
{
    use HasFactory;
    protected $table = 'dailyvote';

    public $primarykey = 'id';

    public $timestamps = true;
}
