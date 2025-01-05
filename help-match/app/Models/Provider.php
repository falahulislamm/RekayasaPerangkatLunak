<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provider extends Model
{
    use HasFactory;

    protected $table = 'provider';
    protected $fillable = ['id', 'user_id', 'email', 'phone', 'address', 'description', 'created_at', 'updated_at'];

    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class, 'user_id'); // pastikan 'user_id' adalah kolom yang menghubungkan User dan Member
    }
}
