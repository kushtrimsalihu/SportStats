<?php

namespace App\Domains\Auth\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateInformation extends Model
{
    // Table Name
    protected $table = 'logo';
    // Primary Key
    public $primaryKey = 'id';

    protected $fillable = [
        'icon'
    ];

    
}

