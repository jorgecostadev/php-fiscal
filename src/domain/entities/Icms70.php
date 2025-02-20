<?php

namespace Src\Domain\Entities;

use Src\Domain\Services\BaseIcmsCalculator;
use Src\Domain\Services\BaseIcmsSTCalculator;
use Src\Domain\Services\BaseReduzidaIcmsCalculator;
use Src\Domain\Services\IcmsCalculator;

class Icms70 implements Icms, IcmsST
{
    private $baseCalculo;
    private $baseCalculoReduzida;

    public function __construct(
        private $valorProduto,
        private $valorFrete,
        private $valorSeguro,
        private $valorDespesas,
        private $valorIpi,
        private $valorDesconto,
        private $aliquotaIcms,
        private $aliquotaRedBcIcms,
        private $aliquotaIcmsST,
        private $aliquotaRedBcIcmsST,
        private $mva
    ) {
        $this->baseCalculo = BaseIcmsCalculator::calculate($valorProduto, $valorFrete, $valorSeguro, $valorDespesas, $valorIpi, $valorDesconto);
        $this->baseCalculoReduzida = BaseReduzidaIcmsCalculator::calculate($valorProduto, $valorFrete, $valorSeguro, $valorDespesas, $valorIpi, $valorDesconto, $aliquotaRedBcIcms);
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
        return $this->aliquotaRedBcIcms > 0;
    }

    public function PossuiRedBCIcmsST(): bool
    {
        return $this->aliquotaRedBcIcmsST > 0;
    }

    public function baseIcms(): float
    {
        if ($this->possuiRedBCIcms()) {
            return $this->baseCalculoReduzida;
        } else {
            return $this->baseCalculo;
        }
    }

    public function valorIcms(): float
    {
        return IcmsCalculator::calculate($this->BaseIcms(), $this->aliquotaIcms);
    }

    public function baseIcmsST(): float
    {
        if ($this->possuiRedBCIcmsST()) {
            return BaseReduzidaIcmsCalculator::calculate($this->valorProduto, $this->valorFrete, $this->valorSeguro, $this->valorDespesas, $this->valorIpi, $this->valorDesconto, $this->aliquotaRedBcIcmsST);
        }
        return BaseIcmsSTCalculator::calculate($this->BaseIcms(), $this->mva);
    }

    public function valorIcmsST(): float
    {
        return (($this->baseIcmsST() * ($this->aliquotaIcmsST / 100)) - $this->valorIcms());
    }
}
