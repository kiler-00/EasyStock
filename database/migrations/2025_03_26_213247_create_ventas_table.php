<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('cliente');
            $table->decimal('total', 10, 2);
            $table->date('fecha');
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // <-- agregado
            $table->integer('cantidad');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('ventas');
    }
};
