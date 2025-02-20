<?php

namespace Src\Domain\Services;

class IcmsSTCalculator
{
    public static function calculate($baseCalculoST, $aliquotaIcmsST, $valorIcms): float
    {
        return (($baseCalculoST * ($aliquotaIcmsST / 100)) - $valorIcms);
    }

}