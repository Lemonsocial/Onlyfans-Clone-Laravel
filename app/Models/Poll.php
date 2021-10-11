<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    use HasFactory;
}
