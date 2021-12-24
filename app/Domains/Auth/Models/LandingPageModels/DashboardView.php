<?php

namespace App\Domains\Auth\Models\LandingPageModels;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardView extends Model
{
    // Table Name
    protected $table = 'landing_page';
    // Primary Key
    public $primaryKey = 'id';

    protected $fillable = [
        'image_admin',
            'title_admin',
            'description_admin',
            'description_cards',
            'image_user',
            'title_user',
            'description_user'
    ];

    
}

