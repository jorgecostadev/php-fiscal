<?php

namespace Src\Domain\Services;

class BaseIcmsSTCalculator
{
    public static function calculate(
        $baseIcms,
        $mva
    ): float {
        return ($baseIcms) * (1 + ($mva / 100));
    }
}
