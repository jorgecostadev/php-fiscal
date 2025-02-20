<?php

namespace Src\Domain\Entities;

use Src\Domain\Entities\Icms;
use Src\Domain\Services\BaseReduzidaIcmsCalculator;
use Src\Domain\Services\IcmsCalculator;

class Icms20 implements Icms
{
    private $baseCalculo;

    public function __construct(
        private $valorProduto,
        private $valorFrete,
        private $valorSeguro,
        private $valorDespesas,
        private $valorIpi,
        private $valorDesconto,
        private $aliquotaIcms,
        private $aliquotaRedBcIcms
    ) {
        $this->baseCalculo = BaseReduzidaIcmsCalculator::calculate($valorProduto, $valorFrete, $valorSeguro, $valorDespesas, $valorIpi, $valorDesconto, $aliquotaRedBcIcms);
    }

    public function possuiIcms(): bool
    {
        return true;
    }

    public function possuiIcmsST(): bool
    {
        return false;
    }

    public function possuiRedBCIcms(): bool
    {
        return true;
    }

    public function possuiRedBCIcmsST(): bool
    {
        return false;
    }

    public function baseIcms(): float
    {
        return $this->baseCalculo;
    }

    public function ValorIcms(): float
    {
        return IcmsCalculator::calculate($this->BaseIcms(), $this->aliquotaIcms);
    }
}
