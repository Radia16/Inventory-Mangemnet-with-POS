<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    //use SoftDeletes;
    protected $fillable=[
        'name',
        'price',
        'product_code',
        'squ_code',
        'count',
        'count',
        'product_image',
        'id',


    ];


    public function category(){
    	return $this->belongsTo(Category::class,'category_id','id');
    }

    public function supplier(){
    	return $this->belongsTo(Supplier::class,'supplier_id','id');
    }

    public function units(){
    	return $this->belongsTo(Unit::class,'unit_id','id');
    }

    public function barnds(){
    	return $this->belongsTo(Unit::class,'brand_id','id');
    }
}




