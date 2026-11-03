<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;

    // Hubungkan model ini ke tabel portofolio_1073s
    protected $table = 'portofolio_1073s';

    protected $guarded = [];
}
