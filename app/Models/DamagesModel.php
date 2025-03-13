<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DamagesModel extends Model
{
    use HasFactory;
    protected $table = 'damages';
    // protected $primaryKey = 'damages_id';
    // public $timestamps = false;
    // protected $fillable = [
    //     'damage_product',
    //     'product_id',
    // ];



    // Relationship with ProductModel
    public function product() {
        return $this->belongsTo(ProductModel::class, 'product_id', 'product_id');
    }

    public function getInventoryDamages() {
        $inventory = InventoryModel::with([
            'product', 
            'product.category', 
            'product.damages'
        ])->get();
    
        return response()->json([
            'success' => true, 
            'damages' => $inventory
        ], 200);
    }
    

}