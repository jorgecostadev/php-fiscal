<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Src\Domain\Services\IcmsCalculator;

final class IcmsCalculatorTest extends TestCase
{
    public function testIcmsCalculator(): void
    {
        $baseCalculo = 1000;
        $aliquota = 17.5;
        
        $expected = 175;
        $result = IcmsCalculator::calculate($baseCalculo, $aliquota);

        $this->assertEquals($expected, $result);
    }
}
