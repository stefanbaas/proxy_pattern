<?php

namespace App\Classes;

use App\Contracts\ImageContract;

class Image implements ImageContract
{
    private $image;

    public function __construct($path)
    {
        if(file_exists($path)) {
            $this->image = imagecreatefromjpeg($path);
        }
    }

    public function getSize()
    {
        if(!$this->image){
            return [0,0];
        }

        return [
            imagesx($this->image),
            imagesy($this->image)
        ];
    }

    public function displayImage()
    {
        if(!$this->image) {
            return null;
        }

        ob_start();
        imagejpeg($this->image);
        $imageString = ob_get_clean();

        return $imageString;
    }
}