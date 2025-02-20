<?php

namespace Src\Domain\Entities;

use Src\Domain\Services\BaseIcmsCalculator;
use Src\Domain\Services\BaseIcmsSTCalculator;
use Src\Domain\Services\IcmsCalculator;
use Src\Domain\Services\IcmsSTCalculator;

class Icms30 implements Icms, IcmsST
{
    private $baseCalculo;
    private $mva;

    public function __construct(
        private $valorProduto,
        private $valorFrete,
        private $valorSeguro,
        private $valorDespesas,
        private $valorIpi,
        private $valorDesconto,
        private $aliquotaIcms,
        private $aliquotaIcmsST,
    ) {
        $this->baseCalculo = BaseIcmsCalculator::calculate($valorProduto, $valorFrete, $valorSeguro, $valorDespesas, $valorIpi, $valorDesconto);
    }

    public function possuiIcms(): bool
    {
        return true;
    }

    public function possuiIcmsST(): bool
    {
        return true;
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

    public function baseIcmsST(): float
    {
        return BaseIcmsSTCalculator::calculate($this->baseIcms(), $this->mva);
    }

    public function valorIcmsST(): float
    {
        return IcmsSTCalculator::calculate($this->baseIcmsST(), $this->aliquotaIcmsST, $this->valorIcms());
    }
}
