<?php

namespace App\Domains\Auth\Models;

use App\Domains\Auth\Http\Controllers\Backend\Sports\SportsController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Table Name
    protected $table = 'tag';
    // Primary Key
    public $primaryKey = 'id';

    protected $filliablle = [
        'name',
    ];

    public $timestamps = true;

}