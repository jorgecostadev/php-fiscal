<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Src\Domain\Entities\Icms00;

final class Icms00Test extends TestCase
{
    public function testIcms00(): void
    {
        $valorProduto = 1000;
        $valorFrete = 100;
        $valorSeguro = 50;
        $valorDespesas = 10;
        $valorIpi = 20;
        $valorDesconto = 30;
        $aliquotaIcms = 18;

        $expectedBaseIcms = $valorProduto + $valorFrete + $valorSeguro + $valorDespesas + $valorIpi - $valorDesconto;
        $expectedValorIcms = 207;
        $result = new Icms00($valorProduto, $valorFrete, $valorSeguro, $valorDespesas, $valorIpi, $valorDesconto, $aliquotaIcms);

        $this->assertEquals($expectedBaseIcms, $result->baseIcms());
        $this->assertEquals($expectedValorIcms, $result->valorIcms());
    }
}
