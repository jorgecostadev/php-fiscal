<?php

namespace Src\Domain\Entities;

class Icms60 implements Icms
{

    public function possuiIcmsProprio(): bool
    {
        return false;
    }

    public function possuiIcmsST(): bool
    {
        return false;
    }

    public function possuiRedBCIcmsProprio(): bool
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
