<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Merchant extends Model
{
    use HasFactory;

    protected $table = 'merchant';
    protected $primaryKey = 'id';

    protected $fillable = [
        'users_id',
        'merchant_name',
        'alamat',
        'kontak',
        'deksripsi',
    ];

    protected static function boot()
    {
        parent::boot();

        // Ketika merchant dihapus, hapus juga list menu terkait
        static::deleting(function ($merchant) {
            $merchant->listMenus()->delete();
        });
    }

    // Relasi dengan model ListMenu
    public function listMenus(): HasMany
    {
        return $this->hasMany(Menu::class, 'merchant_id');
    }

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
