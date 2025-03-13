<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\activity_logsModel;
use App\Models\InventoryModel;
use App\Models\ProductModel;
use App\Models\DamagesModel;

class UserController extends Controller
{

    public function getProduct()
    {
        $products = DB::select("SELECT 
                product.*, 
                inventory.*, 
                category.*, 
                damages.* 
            FROM product
            INNER JOIN inventory ON inventory.product_id = product.product_id
            INNER JOIN category ON category.product_id = product.product_id
            INNER JOIN damages ON damages.product_id = product.product_id
        ");
    
        return response()->json(['success' => true, 'product' => $products], 200);
    }
    
    
    
    public function getInventory() {
        $inventory = InventoryModel::with(['product.category', 'product.damages'])->get();
    
        return response()->json(['success' => true, 'inventory' => $inventory], 200);
    }
    public function getInventoryDamages() {
        $inventory = InventoryModel::with(['product.category', 'product.damages'])->get();
    
        return response()->json([
            'success' => true, 
            'damages' => $inventory
        ], 200);
    }

    public function getInventorywithCategory() {
        $inventory = InventoryModel::with(['product.category', 'product.damages'])->get();
    
        return response()->json([
            'success' => true, 
            'damages' => $inventory
        ], 200);
    

    } 

}
        
    
        
