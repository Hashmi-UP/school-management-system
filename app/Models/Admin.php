<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table="admin";
    protected $fillable=['fisrt_name','last_name', 'email', 'phone', 'address', 'gender', 'religion', 'password', 'image','date'];
}
