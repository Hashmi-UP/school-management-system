<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    use HasFactory;
    protected $table="fees";
    protected $fillable=['sno','tutionfees','libraryfees' ,'labfees','activitiesfees','total', 'fine', 'duedate'];
}
