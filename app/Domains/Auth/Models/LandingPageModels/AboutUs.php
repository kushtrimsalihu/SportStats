<?php

namespace App\Domains\Auth\Models\LandingPageModels;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    // Table Name
    protected $table = 'landing_page';
    // Primary Key
    public $primaryKey = 'id';

    protected $fillable = [
        'title_aboutus',
        'description_aboutus',
        'title_cards',
        'description_cards',
        'title2_cards',
        'description2_cards',
        'title3_cards',
        'description3_cards',
     
        
    ];

    
}

