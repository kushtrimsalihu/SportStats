<?php

namespace App\Domains\Auth\Models\LandingPageModels;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    // Table Name
    protected $table = 'landing_page';
    // Primary Key
    public $primaryKey = 'id';

    protected $fillable = [
        'logo',
        'title',
        'description',
        'image',
     
        
    ];

    
}

