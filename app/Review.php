<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review';
    protected $primaryKey = 'id';
    protected $filllable=['email', 'name', 'descripsi', 'products_id'];
    public $timestamps = true;
    
}
