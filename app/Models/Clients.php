<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    /**
     * Os atributos que podem ser atribuídos em massa.
     */
    protected $fillable = [
        'name', // Adicione aqui
        'cellphone',
        'date_birth',
        'gender',
        'email',
        'SOS_phone',
        'scholarship',
        'work',
        'special_cases',
    ];
}
