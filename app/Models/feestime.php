<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feestime extends Model
{
    use HasFactory;
    protected $table="feestime";
    protected $fillable=['sno','date','duedate' ,'fine'];
    public function fee()
    {
        return $this->hasOne(Fees::class, 'sno');
    }
}
