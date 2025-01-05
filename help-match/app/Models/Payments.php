<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payments extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $fillable = ['id', 'order_id', 'user_id', 'payment_type', 'amount', 'payment_date', 'status'];
    
    //disable created_at and updated_at field
    public $timestamps = false;


    public function user() {
        return $this->belongsTo(User::class, 'user_id'); // pastikan 'user_id' adalah kolom yang menghubungkan User dan Member
    }


}
