<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Src\Domain\Entities\Icms10;

final class Icms10Test extends TestCase
{
    public function testIcms10(): void
    {
        $valorProduto = 1000;
        $valorFrete = 0;
        $valorSeguro = 0;
        $valorDespesas = 0;
        $valorIpi = 0;
        $valorDesconto = 0;
        $aliquotaIcms = 18;

        $expectedBaseIcmsST = 1400;
        $expectedValorIcmsST = 72;
        $result = new Icms10($valorProduto, $valorFrete, $valorSeguro, $valorDespesas, $valorIpi, $valorDesconto, $aliquotaIcms, 18, 40);

        $this->assertEquals($expectedBaseIcmsST, $result->baseIcmsST());
        $this->assertEquals($expectedValorIcmsST, $result->valorIcmsST());
    }
}
