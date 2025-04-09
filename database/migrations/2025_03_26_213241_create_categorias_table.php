<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id(); // UNSIGNED BIGINT, ideal para claves foráneas
            $table->string('nombre')->unique();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('categorias');
    }
};
