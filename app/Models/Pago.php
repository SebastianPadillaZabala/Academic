<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    protected $table = 'pagos';
    protected $fillable = [
        'monto', 'owner', 'card_number', 'expiration_month', 'expiration_year', 'security_code', 'id_user', 'id_suscripcion'
    ];
    protected $primaryKey = 'id_pago';

    static public $atributos = ['monto', 'owner', 'card_number', 'expiration_month', 'expiration_year'];
}
