<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'list_menu';
    protected $primaryKey = 'id_menu';

    protected $fillable = [
        'nama_menu',
        'deskripsi_menu',
        'foto_menu',
        'harga_menu',
    ];
}