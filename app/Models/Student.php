<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'students';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'name',
        'email',
        'image',
    ];
}
