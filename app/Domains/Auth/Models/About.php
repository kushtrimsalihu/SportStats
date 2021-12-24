<?php

namespace App\Domains\Auth\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    // Table Name
    protected $table = 'about';
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
        'confused_features',
        'trial_days',
        'offer',
        'offer_description'
     
        
    ];

    
}

