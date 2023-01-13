<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conta extends Model
{
    use HasFactory;
    protected $table = "contas";
    protected $fillable =['nome','idade'];
}
