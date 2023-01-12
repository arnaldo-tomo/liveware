<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    use HasFactory;

    protected $table='accounts';
    protected $fillable=['name','email','phone','status','year'];
}
