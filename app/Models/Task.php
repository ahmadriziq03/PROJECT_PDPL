<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Pastikan 'fillable' sudah sesuai dengan kolom yang boleh diisi
    protected $fillable = ['title', 'description', 'is_completed'];
}
