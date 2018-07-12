<?php

namespace Tests;

use App\Classes\Image;
use PHPUnit\Framework\TestCase;

class ImageTest extends TestCase
{
    private $sut;

    protected function setUp() /* The :void return type declaration that should be here would cause a BC issue */
    {
        parent::setUp();
        $this->sut = new Image();
    }

    public function testInstantiation () : void
    {
        $this->assertNotNull($this->sut);
    }

    public function testGetSize () : void
    {
        $this->assertTrue(is_array($this->sut->getSize()));
    }
}
