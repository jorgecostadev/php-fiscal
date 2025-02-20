<?php

namespace Src\Domain\Services;

class IcmsCalculator
{
    public static function calculate($baseCalculo, $aliquotaIcms): float
    {
        return ($aliquotaIcms / 100 * $baseCalculo);
    }
}
