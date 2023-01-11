<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected $appends=['image_path','proit_percent'];

    public function getImagePathAttribute(){
        return asset('uploads/products-images/'.$this->image);
    }

    public function getProfitPercentAttribute(){
        $profit = $this->sale_price - $this->purchase_price;
        $profit_percent = $profit * 100 / $this->purchase_price ;
        return Number_Format($profit_percent,2);
    }

    public function category(){
        return $this->belongTo(Category::class);
    }
}
