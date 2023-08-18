<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\items;

class Carts extends Model
{
    use HasFactory;
    protected $fillable = ["id", "item_id", "qtt"];


    public function item(){
        return $this->belongsTo(items::class);
    }
}
