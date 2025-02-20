<?php

namespace Src\Domain\Entities;

use Src\Domain\Entities\Icms;

class Icms40_41_50 implements Icms
{
    public function possuiIcms(): bool
    {
        return false;
    }

    public function possuiIcmsST(): bool
    {
        return false;
    }

    public function possuiRedBCIcms(): bool
    {
        return false;
    }

    public function possuiRedBCIcmsST(): bool
    {
        return false;
    }

    public function baseIcms(): float
    {
        return 0;
    }

    public function valorIcms(): float
    {
        return 0;
    }
}
