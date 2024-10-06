<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Внешний ключ на таблицу пользователей
            $table->foreignId('server_id')->constrained()->onDelete('cascade'); // Внешний ключ на таблицу серверов
            $table->integer('rating'); // Рейтинг, который поставил пользователь
            $table->timestamps();

            // Добавим уникальное ограничение, чтобы предотвратить повторное голосование
            $table->unique(['user_id', 'server_id']);
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
