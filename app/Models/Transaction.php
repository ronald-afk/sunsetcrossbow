<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\transaction_detail;

class transaction extends Model
{
    use HasFactory;
    protected $fillable = ["id", "user_id", "total", "pay_total","waktu"];
    protected $table = 'transaction';

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function detail(){
        return $this->hasMany(transaction_detail::class ,'transaction_id');
    }
    public function item(){
        return $this->belongsTo(items::class,'item_id');
    }
}
