<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageGallery extends Model
{
    protected $table = 'image_gallery';

    protected $fillable = ['name','image','location','image_name','image_size','image_extention','image_height','image_width'];
}
