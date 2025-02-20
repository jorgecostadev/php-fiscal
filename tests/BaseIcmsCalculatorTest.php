<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Src\Domain\Services\BaseIcmsCalculator;

final class BaseIcmsCalculatorTest extends TestCase {
    public function testCalculate(): void {
        $valorProduto = 100;
        $valorFrete = 10;
        $valorSeguro = 5;
        $despesasAcessorias = 2;
        $valorIpi = 5;
        $valorDesconto = 10;
        
        $expected = $valorProduto + $valorFrete + $valorSeguro + $despesasAcessorias + $valorIpi - $valorDesconto;
        $result = BaseIcmsCalculator::calculate(
            $valorProduto,
            $valorFrete,
            $valorSeguro,
            $despesasAcessorias,
            $valorIpi,
            $valorDesconto
        );

        $this->assertEquals($expected, $result);
    }
}