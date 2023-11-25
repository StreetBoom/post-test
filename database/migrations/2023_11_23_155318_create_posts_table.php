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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->text('body');
            $table->string('image')->default('https://sun9-2.userapi.com/impf/c622629/v622629761/dd98/RzWgbFKr6Po.jpg?size=1024x768&quality=96&sign=f0b98ed1318ab953be785b38b199de73&c_uniq_tag=CWvl0ZhqJJAl-Kgn2aKmbYIGU_FyhQ-mWUbUUsB5dZM&type=album');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
