<?php

namespace App\Proxies;

use App\Classes\Image;
use App\Contracts\ImageContract;

class ImageProxy implements ImageContract
{
    protected $path;
    protected $image;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function getSize()
    {
        $this->init();
        return $this->image->getSize();
    }

    public function displayImage()
    {
        // TODO: Implement displayImage() method.
    }

    private function init(){
        if(!$this->image) {
            $this->image = new Image($this->path);
        }
    }
}