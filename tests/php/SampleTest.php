<?php

use PHPUnit\Framework\TestCase;

class SampleTest extends TestCase
{
    public function testBasicExample()
    {
        $this->assertTrue(true);
    }

    public function testMathWorks()
    {
        $this->assertEquals(4, 2 + 2);
    }
}
