<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductPhotoGallery;
use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManagerStatic as Image;

class Product extends Model
{
    protected $fillable = ['product_title', 'product_description', 'product_how_to_use', 'product_warnings', 'product_ingredients', 'product_price', 'category_id', 'category_type', 'photo', 'rate', 'rates'];
    public $timestamps = false;
    protected $casts = [
        'rates' => 'array',
    ];
   

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function gallery()
    {
        return $this->hasMany(ProductPhotoGallery::class, 'product_id', 'id');
    }
    
    public function deletePhoto()
    {
        if ($this->photo) {
            $photo = public_path() . '/products-img/' . $this->photo;
            unlink($photo);
            $photo = public_path() . '/products-img/t_' . $this->photo;
            unlink($photo);
        }
        $this->update([
            'photo' => null,
        ]);
    }

    public function savePhoto(UploadedFile $photo) : string
    {
        $name = $photo->getClientOriginalName();
        $name = rand(1000000, 9999999) . '-' . $name;
        $path = public_path() . '/products-img/';
        $photo->move($path, $name);
        $img = Image::make($path . $name);
        $img->resize(200, 200);
        $img->save($path . 't_' . $name, 90);
        return $name;
    }
}
