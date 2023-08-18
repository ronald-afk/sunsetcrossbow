<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itemreturn extends Model
{
    use HasFactory;

    protected $fillable = ["id", "item_id", "qtt",'alasan'];

    public function item(){
        return $this->belongsTo(items::class);
    }

}
