<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table="students";
    protected $fillable=['sno','name','firstname' ,'lastname','fathername' ,'age','phone','address','email','password','gender','religion', 'doj', 'image'];
    public $timestamps = false;
}
