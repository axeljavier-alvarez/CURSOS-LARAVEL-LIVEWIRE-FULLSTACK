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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('summary')->nullable();
            $table->text('description')->nullable();

            // 1. estado borrador, 2. pendiente y 3. publicado
            $table->integer('status')->default(1);
            // 2. direccion de la imagen
            $table->string('image_path')->nullable();
            // 3. direccion del video
            $table->string('video_path')->nullable();
            // 4. mensaje de bienvenida
            $table->text('welcome_message')->nullable();
            // 5. mensaje de despedida
            $table->text('goodbye_message')->nullable();
            // 6. observacion
            $table->text('observation')->nullable();
            // 7. usuario id
            $table->foreignId('user_id')->constrained();
            // 8. nivel id
            $table->foreignId('level_id')->constrained();
            $table->foreignId('category_id')->constrained();
            
            $table->foreignId('price_id')->constrained();

            $table->timestamp('published_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
