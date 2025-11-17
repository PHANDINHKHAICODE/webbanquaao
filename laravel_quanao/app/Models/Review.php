<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'product_reviews'; // bắt buộc trùng tên bảng
    protected $fillable = [
        'product_id',
        'user_id',
        'rating',
        'comment',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product() {
        return $this->belongsTo(san_pham::class, 'product_id');
    }
}