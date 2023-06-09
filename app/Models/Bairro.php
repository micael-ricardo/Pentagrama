<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bairro extends Model
{
    use HasFactory;


    protected $fillable = [
        'nome',
        'cidade_id',
    ];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }
    public function ceps()
    {
        return $this->hasMany(Cep::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($bairro) {
            $bairro->ceps()->delete();
        });
    }
}
