<?php

namespace Tests;

use App\Classes\Image;
use App\Contracts\ImageContract;
use PHPUnit\Framework\TestCase;

class ImageTest extends TestCase
{
    private $sut;

    protected function setUp() /* The :void return type declaration that should be here would cause a BC issue */
    {
        parent::setUp();
        $this->sut = new Image(null);
    }

    public function testInstantiation () : void
    {
        $this->assertNotNull($this->sut);
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf(ImageContract::class, $this->sut);
    }

    public function testGetSize () : void
    {
        $size = $this->sut->getSize();
        $this->assertTrue(is_array($size));
        $this->assertEquals(2, count($size));
    }

    public function testDisplayImage()
    {
        $image = $this->sut->displayImage();
        $this->assertTrue((is_string($image) || is_null($image)));
    }
}
