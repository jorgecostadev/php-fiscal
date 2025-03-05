<?php

namespace Src\Domain\Entities;

use Src\Domain\Services\BaseIcmsCalculator;
use Src\Domain\Services\BaseIcmsSTCalculator;
use Src\Domain\Services\IcmsCalculator;
use Src\Domain\Services\IcmsSTCalculator;

class Icms10 implements Icms, IcmsST
{
    private $baseCalculo;

    public function __construct(
        private $valorProduto,
        private $valorFrete,
        private $valorSeguro,
        private $despesasAcessorias,
        private $valorIpi,
        private $valorDesconto,
        private $aliquotaIcms,
        private $aliquotaIcmsST,
        private $mva
    ) {
        $this->baseCalculo = BaseIcmsCalculator::calculate($valorProduto, $valorFrete, $valorSeguro, $despesasAcessorias, $valorIpi, $valorDesconto);
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
