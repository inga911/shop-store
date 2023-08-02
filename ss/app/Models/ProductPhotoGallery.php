<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class ProductPhotoGallery extends Model
{
    use HasFactory;
    protected $fillable = ['product_photos', 'product_id'];
    public $timestamps = false;
 

    public static function add(UploadedFile $gallery, int $product_id)
    {
        $name = $gallery->getClientOriginalName();
        $name = rand(1000000, 9999999) . '-' . $name;
        $path = public_path() . '/products-img/';
        $gallery->move($path, $name);
        self::create([
            'product_id' => $product_id,
            'product_photos' => $name
        ]);
    }

    public function deletePhoto()
    {
        
        $photo = public_path() . '/products-img/' . $this->product_photos;
        unlink($photo);
        $this->delete();
    }
}
