<?php

namespace Src\Domain\Services;

class BaseIcmsCalculator
{
    public static function calculate(
        $valorProduto,
        $valorFrete,
        $valorSeguro,
        $valorDespesas,
        $valorIpi,
        $valorDesconto
    ): float {
        return $valorProduto + $valorFrete + $valorSeguro + $valorDespesas + $valorIpi - $valorDesconto;
    }
}
