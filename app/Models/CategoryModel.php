<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
      protected $table = 'category';

      public function getInventoryWithCategory(){
        $inventory = InventoryModel::with([
            'product' => function($q) {
                $q->select('*');
            },
            'product.category' => function($q) {
                $q->select('*');
            },
            'product.damages' => function($q) {
                $q->select('*');
            }
        ])->get();
    
        return response()->json([
            'success' => true,
            'inventory' => $inventory
        ], 200);
    }
    
}
