<?php

namespace Src\Domain\Services;

class BaseReduzidaIcmsCalculator
{
    public static function calculate(
        $valorProduto,
        $valorFrete,
        $valorSeguro,
        $valorDespesas,
        $valorIpi,
        $valorDesconto,
        $aliquotaBcRedIcms
    ): float {
        $baseNormal = $valorProduto + $valorFrete + $valorSeguro + $valorDespesas - $valorDesconto;
        return ($baseNormal - ($baseNormal * ($aliquotaBcRedIcms / 100))) + $valorIpi;
    }
}
