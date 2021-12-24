<?php

namespace App\Domains\Auth\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    // Table Name
    protected $table = 'faq';
    // Primary Key
    public $primaryKey = 'faq_id';

    protected $filliablle = [
        'questions',
        'answers'

    ];
        //Timestamps
    public $timestamps = true;



}
