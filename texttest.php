<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
include 'text.php';
final class nthtest extends TestCase
{
    public function testLong(){
        $text = new text();
        $this->assertTrue($text->checkLong("football vs soccer"));
    }
}