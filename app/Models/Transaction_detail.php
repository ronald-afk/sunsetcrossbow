<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\items;
use App\Models\transaction;

class transaction_detail extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'transaction_detail';
    
    public function transaction(){
        return $this->belongsTo(transaction::class);
    }
    public function item(){
        return $this->belongsTo(items::class);
    }
}
