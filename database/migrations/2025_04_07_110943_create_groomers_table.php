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
        Schema::create('groomers', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('phone')->unique();
            $table->string('specialization');
        });

        DB::table('groomers')->insert([
            [
                'name' => 'Анна',
                'phone' => '+79501234567',
                'specialization' => 'Старший мастер',
            ],
            [
                'name' => 'Василина',
                'phone' => '+79059876543',
                'specialization' => 'Старший мастер'
            ],
            [
                'name' => 'Дмитрий',
                'phone' => '+79081478523',
                'specialization' => 'Подмастерье'
            ],
            [
                'name' => 'Сергей',
                'phone' => '+79002589632',
                'specialization' => 'Главный мастер'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groomers');
    }
};