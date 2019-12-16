<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
include 'nth.php';
final class nthtest extends TestCase
{
    public function testAngka(){
        $angka = new nth();
        $this->assertEquals(0,$angka->check(1000000));
    }
}

