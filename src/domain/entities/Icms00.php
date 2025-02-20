<?php

namespace Src\Domain\Entities;

use Src\Domain\Services\BaseIcmsCalculator;
use Src\Domain\Services\IcmsCalculator;

class Icms00 implements Icms
{
    private $baseCalculo;

    public function __construct(
        private $valorProduto,
        private $valorFrete,
        private $valorSeguro,
        private $valorDespesas,
        private $valorIpi,
        private $valorDesconto,
        private $aliquotaIcms
    ) {
        $this->baseCalculo = BaseIcmsCalculator::calculate($valorProduto, $valorFrete, $valorSeguro, $valorDespesas, $valorIpi, $valorDesconto);
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
        return false;
    }

    public function possuiRedBCIcmsST(): bool
    {
        return false;
    }

    public function baseIcms(): float
    {
        return $this->baseCalculo;
    }

    public function valorIcms(): float
    {
        return IcmsCalculator::calculate($this->baseIcms(), $this->aliquotaIcms);
    }
}
