<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    protected function setUp() /* The :void return type declaration that should be here would cause a BC issue */
    {
        parent::setUp();
    }

    public function testAssertion ()
    {
        $this->assertNotEquals(1, 0);
    }
}
