<?php

use PHPUnit\Framework\TestCase;

class ImageFeatureTest extends TestCase
{
    private $imagePath;

    protected function setUp() /* The :void return type declaration that should be here would cause a BC issue */
    {
        parent::setUp();

        $this->imagePath = dirname(__FILE__) .'/testImage.jpg';

        if (!file_exists($this->imagePath)) {
            $image = imagecreate(500, 500);
            try {
                imagejpeg($image, $this->imagePath);
            } catch (\Exception $e) {
                throw new \Exception('You have no permission to create files in this directory:' . $e);
            }
        }

    }

    protected function tearDown()/* The :void return type declaration that should be here would cause a BC issue */
    {
        parent::tearDown();

        if (file_exists($this->imagePath)) {
            unlink( $this->imagePath);
        }
    }

    public function testImage () : void
    {
        $image = new \App\Proxies\ImageProxy($this->imagePath);
        $this->assertEquals([500,500], $image->getSize());
        $this->assertEquals(true, is_string($image->displayImage()));
    }

    public function testNoImage () : void
    {
        $image = new \App\Proxies\ImageProxy(null);
        $this->assertEquals([0,0], $image->getSize());
        $this->assertEquals(true, is_null($image->displayImage()));
    }
}