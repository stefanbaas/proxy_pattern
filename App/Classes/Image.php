<?php

namespace App\Classes;

use App\Contracts\ImageContract;

class Image implements ImageContract
{

    public function getSize()
    {
        return [0,0];
    }

    public function displayImage()
    {
        // TODO: Implement displayImage() method.
    }
}