<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perpustakaan extends Model
{
    /** @use HasFactory<\Database\Factories\PerpustakaanFactory> */
    use HasFactory;
    protected $guarded = ["id"];
}
