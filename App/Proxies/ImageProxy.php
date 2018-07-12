<?php

namespace App\Proxies;

use App\Contracts\ImageContract;

class ImageProxy implements ImageContract
{
    protected $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function getSize()
    {
        // TODO: Implement getSize() method.
    }

    public function displayImage()
    {
        // TODO: Implement displayImage() method.
    }
}