<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'plan_reference',
        'first_name',
        'last_name',
        'investment_house',
    ];
}
