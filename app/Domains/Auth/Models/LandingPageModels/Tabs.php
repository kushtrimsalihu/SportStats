<?php

namespace App\Domains\Auth\Models\LandingPageModels;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabs extends Model
{
    // Table Name
    protected $table = 'landing_page';
    // Primary Key
    public $primaryKey = 'id';

    protected $fillable = [
        'tab1',
        'tab2',
        'tab3',
        'tab4',
        'tab1_description',
        'tab2_description',
        'tab3_description',
        'tab4_description'
     
        
    ];

    
}

