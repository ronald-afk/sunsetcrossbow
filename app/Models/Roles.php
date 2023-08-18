<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;
class roles extends Model
{
    use HasFactory;
    protected $fillable = ['id_roles','roles'];
    protected $table = 'roles';
}
