<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Src\Domain\Services\BaseIcmsSTCalculator;
use Src\Domain\Services\IcmsCalculator;
use Src\Domain\Services\IcmsSTCalculator;

final class IcmsSTCalculatorTest extends TestCase
{
    public function testIcmsCalculator(): void
    {
        $baseCalculo = 1000;
        $aliquota = 18;
        $valorIcms = IcmsCalculator::calculate($baseCalculo, $aliquota);
        $mva = 40;
        $baseCalculoST = BaseIcmsSTCalculator::calculate($baseCalculo, $mva);
        
        $expected = 72;
        $result = IcmsSTCalculator::calculate($baseCalculoST, $aliquota, $valorIcms);
        
        $this->assertEquals($expected, $result);
    }
}
