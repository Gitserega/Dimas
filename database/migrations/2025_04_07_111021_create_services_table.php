<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Создаем таблицу
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('description');
            $table->integer('price');
            $table->integer('duration_minutes'); // Исправлено: нельзя использовать скобки в имени столбца
        });

        // Вставляем данные (должно быть внутри метода up!)
        DB::table('services')->insert([
            [
                'name' => 'Водные процедуры',
                'description' => 'Мойка и сушка любимого питомца',
                'price' => 1000,  // Лучше использовать число, а не строку
                'duration_minutes' => 60  // Исправленное имя столбца
            ],
            [
                'name' => 'Очистка ушей и стрижка когтей',
                'description' => 'Аккуратный уход за когтями и ушами',
                'price' => 500,
                'duration_minutes' => 30
            ],
            [
                'name' => 'Стрижка',
                'description' => 'Вычес и стрижка профессиональными средствами',
                'price' => 2000,
                'duration_minutes' => 120
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};