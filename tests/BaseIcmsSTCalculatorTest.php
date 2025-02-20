<?php 

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Src\Domain\Services\BaseIcmsSTCalculator;

final class BaseIcmsSTCalculatorTest extends TestCase {
    public function testCalculateBaseIcmsST(): void {
        $baseIcmsST = 1000;
        $mva = 40;
        
        $expect = 1400;
        $result = BaseIcmsSTCalculator::calculate($baseIcmsST, $mva);
        
        $this->assertEquals($expect, $result);
    }
}