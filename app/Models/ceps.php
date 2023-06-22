<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ceps extends Model
{
    use HasFactory;

    protected $fillable = [
        'bairro_id',
        'cep',
        'rua',
    ];
    
    public function bairro()
    {
        return $this->belongsTo(Bairro::class);
    }

}
