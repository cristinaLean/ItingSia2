<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;

    protected $table = 'product';  // Ensure correct table name

    // protected $primaryKey = 'product_id'; // Explicitly define the primary key

    // public $timestamps = false; // If your table doesn't have created_at and updated_at
    public function inventory() {
        return $this->hasOne(InventoryModel::class, 'product_id', 'product_id');
    }

    // Define the relationship with CategoryModel
    public function category() {
        return $this->belongsTo(CategoryModel::class, 'cat_id', 'cat_id');
    }

    // Define the relationship with DamagesModel
    public function damages() {
        return $this->hasMany(DamagesModel::class, 'product_id', 'product_id');
    }
}


