<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'question'
    ];

    public static $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email:rfc,dns',
        'question' => 'required'
    ];

    protected $table = 'contact_us';
}
