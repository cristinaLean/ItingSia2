<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        
        Schema::create('users', function (Blueprint $table) {
            $table->id('users_id');
            $table->enum('role', ['admin', 'employee'])->notNull(); 
            $table->string('Firstname');
            $table->string('Middlename');
            $table->string('Lastname');
            $table->integer('contact_no'); 
            $table->string('Address');
            $table->foreignId('log_id'); 
            $table->foreignId('inventory_id'); 
            // Add foreign key constraints
            $table->foreign('log_id')->references('log_id')->on('activity_logs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('inventory_id')->references('inventory_id')->on('inventory')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps(); 
        });
    }

    
    public function down(): void
    {
        
        Schema::dropIfExists('users');
    }
};
