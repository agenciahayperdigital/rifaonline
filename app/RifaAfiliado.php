<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RifaAfiliado extends Model
{
    protected $fillable = [
        'product_id',
        'afiliado_id',
        'token','porcentagem'
    ];

    public static function totalVendido($product_id, $afiliado_id)
    {
        // Calcula o total vendido para a rifa e afiliado específicos
        return self::where('product_id', $product_id)
                    ->where('afiliado_id', $afiliado_id)
                    ->where('pago', 1) // considerando que há um campo "pago"
                    ->sum('valor'); // supondo que o campo para valor seja "valor"
    }
}
