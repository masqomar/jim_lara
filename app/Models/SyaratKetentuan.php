<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SyaratKetentuan extends Model
{
    use HasFactory;
    protected $table = 'syarat_ketentuan';

    public $timestamps = false;

    protected $fillable = [
        'judul',
        'deskripsi'
    ];
}
