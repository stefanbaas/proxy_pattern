<?php

namespace Tests;

use App\Proxies\ImageProxy;
use PHPUnit\Framework\TestCase;

class ImageProxyTest extends TestCase
{
    private $sut;

    protected function setUp() /* The :void return type declaration that should be here would cause a BC issue */
    {
        parent::setUp();
        $this->sut = new ImageProxy(null);
    }

    public function testInstantiation () : void
    {
        $this->assertNotNull($this->sut);
    }
}
