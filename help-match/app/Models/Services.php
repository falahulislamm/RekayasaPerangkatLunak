<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Services extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $fillable = ['id', 'name', 'description', 'price_range', 'created_at', 'updated_at'];

    public $timestamps = false;
}
