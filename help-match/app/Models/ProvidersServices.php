<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProvidersServices extends Model
{
    use HasFactory;

    protected $table = 'providers_services';
    protected $fillable = ['id', 'provider_id', 'service_id', 'price', 'description'];
    
    //disable created_at and updated_at field
    public $timestamps = false;

    public function provider(){
        return $this->belongsTo(Provider::class, 'provider_id'); //belongsTo -> one to many
    }

    public function services(){
        return $this->belongsTo(Services::class, 'service_id'); //belongsTo -> one to many
    }
}
