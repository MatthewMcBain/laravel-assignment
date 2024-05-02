<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pizzas', function (Blueprint $table) {
            $table->id();
            $table->string('pizza_name');
            $table->string('description');
            // $table->double('price');
            // $table->enum('size', ['small', 'medium', 'large']);
            // $table->enum('size', {'small': '', 'medium', 'large'});
            // $table->json('size'); - preferably
            // $table->array('toppings');
            // $table->json('topping_name');
            // $table->set('toppings', ['cheese', 'tomato sauce']); - preferably
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pizzas');
    }
};
