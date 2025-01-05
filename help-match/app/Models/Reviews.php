<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reviews extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $fillable = ['id', 'order_id', 'user_id', 'rating', 'comment', 'review_date'];
    
    //disable created_at and updated_at field
    public $timestamps = false;

    public function orders(){
        return $this->belongsTo(Orders::class, 'order_id'); //belongsTo -> one to many
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id'); // pastikan 'user_id' adalah kolom yang menghubungkan User dan Member
    }
}
