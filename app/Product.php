<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	/**
	 * Specify which table this method belogs to.
	 */
    //protected $table = 'products';
    protected $fillable = ['name', 'content', 'measure', 'price', 'description', 'barcode'];

    public function productDetails(){
       return $this->hasMany('App\ProductDetail');
    }
}
