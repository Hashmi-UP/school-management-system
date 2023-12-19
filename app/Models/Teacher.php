<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table="teacheruser";
    protected $fillable=['sno','name','firstname' ,'lastname','age','phone','address','email','password','mainsubject', 'doj', 'image'];
    public $timestamps = false;

}
