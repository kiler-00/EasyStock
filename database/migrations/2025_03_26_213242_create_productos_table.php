<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('codigo')->unique();
            $table->integer('stock');
            $table->decimal('precio', 10, 2);
            $table->string('categoria');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('productos');
    }
};
