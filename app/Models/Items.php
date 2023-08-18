<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\carts;
use App\Models\categories;
use App\Models\transaction;


class items extends Model
{
    use HasFactory;
    protected $fillable = ["id", "category_id", "name", "price", "stock"];
    protected $table = 'items';
    public function category(){
        return $this-> belongsTo(Category::class, 'category_id');
    }
    public function cart(){
        return $this->hasOne(carts::class, 'item_id');
    }
    public function transaction(){
        return $this->hasManyThrough(transaction::class, transaction_detail::class);
    }

}
