<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['id', 'customer_id', 'user_id', 'provider_id', 'provider_service_id', 'status', 'order_date'];
    
    //disable created_at and updated_at field
    public $timestamps = false;

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id'); //belongsTo -> one to many
    }

    public function provider(){
        return $this->belongsTo(Provider::class, 'provider_id'); //belongsTo -> one to many
    }

    public function providers_services(){
        return $this->belongsTo(ProvidersServices::class, 'provider_service_id'); //belongsTo -> one to many
    }


    public function user() {
        return $this->belongsTo(User::class, 'user_id'); // pastikan 'user_id' adalah kolom yang menghubungkan User dan Member
    }
}
